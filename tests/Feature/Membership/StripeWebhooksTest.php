<?php

namespace Tests\Feature\Membership;

use Tests\AppTest;
use Tests\Traits\{InteractsWithStripe, BillingResources};
use App\Billing\Sources\Stripe;
use App\User;

class StripeWebhooksTest extends AppTest
{
    use InteractsWithStripe, BillingResources;

    /** @test */
    public function it_tracks_when_a_trial_converts_into_a_active_membership()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->assertFalse($user->isAuthorized());

        $this->postStripeMembership($user);

        $this->fakeStripeWebhook($user, 'subscriptionRenewed');

        $this->assertTrue($user->membership->source->isActive());
        $this->assertTrue($user->isAuthorized());
    }

    /** @test */
    public function it_tracks_when_a_trial_does_not_convert_into_a_membership()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->postStripeMembership($user);

        $this->assertTrue($user->fresh()->membership->source->isActive());
        $this->assertFalse($user->fresh()->membership->source->isEnded());
        $this->assertTrue($user->isAuthorized());

        $this->fakeStripeWebhook($user, 'subscriptionDidNotRenew');

        $this->assertFalse($user->fresh()->membership->source->isActive());
        $this->assertTrue($user->fresh()->membership->source->isEnded());
        $this->assertFalse($user->fresh()->isAuthorized());
    }

    /** @test */
    public function it_tracks_when_a_trial_or_membership_is_set_to_not_renew()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->postStripeMembership($user);

        $this->assertTrue($user->membership->source->isActive());
        $this->assertFalse($user->membership->source->isCanceled());
        $this->assertFalse($user->membership->source->isEnded());
        $this->assertTrue($user->membership->source->willRenew());
        $this->assertFalse($user->membership->source->isOnGracePeriod());
        $this->assertTrue($user->isAuthorized());

        $this->fakeStripeWebhook($user, 'subscriptionWillNotRenew');

        $this->assertTrue($user->fresh()->membership->source->isActive());
        $this->assertTrue($user->fresh()->membership->source->isCanceled());
        $this->assertFalse($user->fresh()->membership->source->isEnded());
        $this->assertFalse($user->fresh()->membership->source->willRenew());
        $this->assertTrue($user->fresh()->membership->source->isOnGracePeriod());
        $this->assertTrue($user->fresh()->isAuthorized());
    }

    /** @test */
    public function it_tracks_when_the_user_changes_their_plan()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->postStripeMembership($user);

        $originalPlan = $user->membership->source->plan;

        $this->fakeStripeWebhook($user, 'planChanged');

        $this->assertNotEquals($originalPlan, $user->fresh()->membership->source->plan);
    }

    /** @test */
    public function it_tracks_when_a_user_pauses_or_resumes_their_membership()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->postStripeMembership($user);

        $this->assertTrue($user->membership->source->isActive());
        $this->assertFalse($user->membership->source->isPaused());
        $this->assertTrue($user->isAuthorized());

        $this->fakeStripeWebhook($user, 'subscriptionPaused');

        $this->assertFalse($user->fresh()->membership->source->isActive());
        $this->assertTrue($user->fresh()->membership->source->isPaused());
        $this->assertFalse($user->fresh()->membership->source->isEnded());
        $this->assertFalse($user->fresh()->membership->source->isOnGracePeriod());
        $this->assertFalse($user->fresh()->isAuthorized());

        $this->fakeStripeWebhook($user, 'subscriptionResumed');

        $this->assertTrue($user->fresh()->membership->source->isActive());
        $this->assertFalse($user->fresh()->membership->source->isPaused());
        $this->assertFalse($user->fresh()->membership->source->isEnded());
        $this->assertFalse($user->fresh()->membership->source->isOnGracePeriod());
        $this->assertTrue($user->fresh()->isAuthorized());
    }

    /** @test */
    public function it_tracks_when_an_admin_cancels_a_users_membership()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->postStripeMembership($user);

        $this->assertTrue($user->membership->source->isActive());
        $this->assertFalse($user->membership->source->isCanceled());
        $this->assertFalse($user->membership->source->isEnded());
        $this->assertTrue($user->isAuthorized());

        $this->fakeStripeWebhook($user, 'subscriptionDeleted');

        $this->assertFalse($user->fresh()->membership->source->isActive());
        $this->assertTrue($user->fresh()->membership->source->isCanceled());
        $this->assertTrue($user->fresh()->membership->source->isEnded());
        $this->assertFalse($user->fresh()->isAuthorized());
    }

    /** @test */
    public function it_tracks_when_the_user_updates_their_payment_method()
    {
        $user = create(User::class);

        $this->signIn($user);

        $this->postStripeMembership($user);

        $last4 = $user->membership->source->card_last_four;

        $this->fakeStripeWebhook($user, 'cardUpdated');

        $this->assertNotEquals($last4, $user->fresh()->membership->source->card_last_four);
    }
}