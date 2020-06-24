<?php

namespace Tests\Feature;

use Tests\AppTest;
use Tests\Traits\AdminEvents;
use App\Notifications\NewPurchaseCompleted;
use Illuminate\Http\UploadedFile;
use App\Shop\eBook;

class eBooksTest extends AppTest
{
    use AdminEvents;

    /** @test */
    public function an_admin_can_create_a_new_ebook()
    {
        $this->signIn();

        $ebook = $this->storeEBook();

        $this->assertDatabaseHas('e_books', ['title' => $ebook->title]);

        $this->assertNotNull($ebook->cover_path);
        $this->assertNotNull($ebook->shelf_cover_path);
        $this->assertNotEquals($ebook->cover_path, $ebook->shelf_cover_path);
        \Storage::disk('public')->assertExists($ebook->cover_path);
        \Storage::disk('public')->assertExists($ebook->shelf_cover_path);
    }

    /** @test */
    public function an_admin_can_edit_an_existing_ebook()
    {
        $this->signIn();

        $ebook = $this->storeEBook();

        $originalTitle = $ebook->title;
        $originalCover = $ebook->cover_path;
        $originalShelfCover = $ebook->shelf_cover_path;

        $update = make(eBook::class, [
            'cover_image' => UploadedFile::fake()->image('cover.jpg'), 
            'shelf_cover_image' => UploadedFile::fake()->image('shelf.jpg')
        ]);

        $this->patch(route('admin.ebooks.update', $ebook), $update->toArray());

        $this->assertNotEquals($originalTitle, $ebook->fresh()->title);
        \Storage::disk('public')->assertMissing($originalCover);
        \Storage::disk('public')->assertMissing($originalShelfCover);
        \Storage::disk('public')->assertExists($ebook->fresh()->cover_path);
        \Storage::disk('public')->assertExists($ebook->fresh()->shelf_cover_path);
    }

    /** @test */
    public function an_admin_can_upload_multiple_preview_images()
    {
        $this->signIn();

        $ebook = $this->storeEBook();

        $this->assertCount(0, $ebook->fresh()->previews);

        $this->post(route('admin.ebooks.previews.upload', $ebook), ['preview_image' => UploadedFile::fake()->image('preview1.jpg')]);

        $this->assertCount(1, $ebook->fresh()->previews);

        $this->post(route('admin.ebooks.previews.upload', $ebook), ['preview_image' => UploadedFile::fake()->image('preview2.jpg')]);

        $this->assertCount(2, $ebook->fresh()->previews);
    }

    /** @test */
    public function an_admin_can_remove_previews()
    {
        $this->signIn();

        $ebook = $this->storeEBook();

        $this->assertCount(0, $ebook->fresh()->previews);

        $this->post(route('admin.ebooks.previews.upload', $ebook), ['preview_image' => UploadedFile::fake()->image('preview1.jpg')]);

        $this->assertCount(1, $ebook->fresh()->previews);

        $preview = $ebook->fresh()->previews[0];

        \Storage::disk('public')->assertExists($preview);

        $this->delete(route('admin.ebooks.previews.remove', $ebook), ['preview_path' => $preview]);

        $this->assertCount(0, $ebook->fresh()->previews);

        \Storage::disk('public')->assertMissing($preview);
    }

    /** @test */
    public function an_admin_can_remove_an_ebook()
    {
        $this->signIn();

        $ebook = $this->storeEBook();
        $this->post(route('admin.ebooks.previews.upload', $ebook), ['preview_image' => UploadedFile::fake()->image('preview1.jpg')]);

        $preview = $ebook->fresh()->previews[0];

        $this->delete(route('admin.ebooks.destroy', $ebook));

        $this->assertDatabaseMissing('posts', ['title' => $ebook->title]);

        \Storage::disk('public')->assertMissing($ebook->cover_path);
        \Storage::disk('public')->assertMissing($ebook->shelf_cover_path);
        \Storage::disk('public')->assertMissing($preview);
    }

    /** @test */
    public function admins_are_notified_when_a_user_purchases_an_ebook()
    {
        \Notification::fake();

        $this->user->purchase($this->ebook);

        \Notification::assertSentTo($this->admin, NewPurchaseCompleted::class);
    }
}
