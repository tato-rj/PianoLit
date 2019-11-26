<?php

namespace App\Services;

class Rankings
{
	protected $year = ['abrsm' => '19/20', 'rcm' => '2015'];
	
	protected $rcm = [
		[
			// LIST A
			'Burlesque in G Major (in Notebook for Wolfgang)' => 'Anonymous',
			'Aria in F Major, BWV Anh. 131 (in Notenbuch der Anna Magdalena Bach)' => 'Bach, Johann Christian',
			'Minuet in C Major' => 'Bach, Johann Christoph Friedrich',
			'Schwäbisch in D Major' => 'Bach, Johann Christoph Friedrich',
			'Chorale, BWV 514 (in Notenbuch der Anna Magdalena Bach BAR; WIE)' => 'Bach, Johann Sebastian',
			'Écossaise in E flat Major, WoO 86 (in Celebrate Beethoven, 1 FHM)' => 'Beethoven, Ludwig van',
			'Ukrainian Folk Song, op. 107, no. 3' => 'Beethoven, Ludwig van',
			'Pyrenese Melody, Op.42 No.48' => 'Clementi, Muzio',
			'Sonatina in C Major' => 'Duncombe, William',
			'German Dance in D Major, Hob. IX:22, no. 2' => 'Haydn, Franz Joseph',
			'German Dance in G Major, Hob. IX:22, no. 3' => 'Haydn, Franz Joseph',
			'Minuet in A Minor, from Partita No. 6 in B flat Major ' => 'Krieger, Johann',
			'Allegro in B flat Major, K 3' => 'Mozart, Wolfgang Amadeus',
			'Minuet in F Major, K 2' => 'Mozart, Wolfgang Amadeus',
			'Andante in G Minor' => 'Telemann, Georg Philipp',
			'The Ballet' => 'Türk, Daniel Gottlob',
			'The Hunting Horns and the Echo' => 'Türk, Daniel Gottlob',
			'Arioso in F Major' => 'Türk, Daniel Gottlob',
			// LIST B
			'A Happy Tale (no. 31)' => 'Gedike, Alexander',
			'Spooky Footsteps' => 'Gillock, William',
			'Toy Soldiers March' => 'Goolkasian Rahbee, Dianne',
			'Waltz (Op.39 no. 13)' => 'Kabalevsky, Dmitri',
			'Etude in C Major (Op.125 no. 3)' => 'Diabelli, Anton'
		],
		[
			'Minuet in E flat Major, H 171' => 'Bach, Carl Philipp Emanuel',
			'Minuet III in G Major, from Suite in G Minor, BWV 822' => 'Bach, Johann Sebastian
',
			'Écossaise in G Major, WoO 23' => 'Beethoven, Ludwig van',
			'Sonatina in C Major, op. 151, no. 2' => 'Diabelli, Anton',
			'Allegro in F Major, K 1c' => 'Mozart, Wolfgang Amadeus',
			'Sonata in C Major, K 73b' => 'Scarlatti, Domenico',
			'Écossaise, D 299, no. 8' => 'Schubert, Franz',
			'A Cheerful Spirit' => 'Türk, Daniel Gottlob',
			'Children at Play' => 'Bartók, Béla',
			'On a Quiet Lake' => 'Gillock, William',
			'An Evening Tale' => 'Khachaturian, Aram',
			'The Sick Doll (no. 7)' => 'Tchaikovsky, Pyotr Il’yich',
		],
		[
			'Musette in D Major, BWV Anh. 126' => 'Bach, Johann Sebastian',
			'Minuet in G Major, BWV Anh. 114' => 'Petzold, Christian',
			'Sonatina in G Major' => 'Beethoven, Ludwig van',
			'Sonatina in A Minor (no. 5)' => 'Gurlitt, Cornelius',
			'Carefree Happiness' => 'Türk, Daniel Gottlob',
			'Play (For children no. 5)' => 'Bartók, Béla',
			'Wild Mignonette (no. 1)' => 'Gurlitt, Cornelius',
			'Clowns (Op.39 no. 20)' => 'Kabalevsky, Dmitri',
			'Medieval Festival' => 'Olson, Kevin',
			'Arabesque' => 'Burgmüller, Johann Friedrich',
			'	Morning Prayer (Morgengebet) (Op.101 no. 2)' => 'Gurlitt, Cornelius'
		],
		[
			'March in D Major, BWV Anh. 122' => 'Bach, Carl Philipp Emanuel',
			'Musette, from English Suite No. 3 in G Minor, BWV 808' => 'Bach, Johann Sebastian',
			'Aria (Sonata in D Minor, K 32)' => 'Scarlatti, Domenico',
			'German Dance in E flat Major (no. 9)' => 'Beethoven, Ludwig van',
			'Sonatina in G Major (Op.36 no. 2)' => 'Clementi, Muzio',
			'Sonatina in F Major, op. 168, no. 1' => 'Diabelli, Anton',
			'Sonatina in G Major, op. 151, no. 1' => 'Diabelli, Anton',
			'Sonata in F Major, Hob. XVI:9' => 'Haydn, Franz Joseph',
			'Children’s Game (For Children 1 no. 8)' => 'Bartók, Béla',
			'Farewell (For Children 2 no. 34)' => 'Bartók, Béla',
			'Little Flower in F Major (no. 8)' => 'Gurlitt, Cornelius',
			'A Sad Story (Op.27 no. 6)' => 'Kabalevsky, Dmitri',
			'Les bonbons (Candy) (Op.289 no. 2)' => 'Milhaud, Darius',
			'The Happy Farmer (no. 10)' => 'Schumann, Robert',
			'Sad Tale (Op.69 no. 5)' => 'Shostakovich, Dmitri',
			'Old French Song (Op.39 no. 16)' => 'Tchaikovsky, Pyotr Il’yich',
			'Dragon Fly' => 'Gillock, William'
		],
		[
			'Little Prelude in C Major, BWV 939' => 'Bach, Johann Sebastian',
			'Minuet in G Minor, BWV 842' => 'Bach, Johann Sebastian',
			'Sonata in D Minor, K 34' => 'Scarlatti, Domenico',
			'Sonatina in F Major (no. 2)' => 'Beethoven, Ludwig van',
			'Sonatina in G Major (no. 5)' => 'Clementi, Muzio',
			'Sonatina in C Major (Op.168 no. 3)' => 'Diabelli, Anton',
			'Sonatina in A Minor (Op.214 no. 4)' => 'Gurlitt, Cornelius',
			'Sonata in C Major, Hob. XI:10' => 'Haydn, Franz Joseph',
			'Sonatina in C Major, op. 55, no. 1' => 'Kuhlau, Friedrich',
			'Teasing Song (no. 18)' => 'Bartók, Béla',
			'Sunday Afternoon Music' => 'Copland, Aaron',
			'Serenade' => 'Gillock, William',
			'Waltz (no. 2)' => 'Grieg, Edvard',
			'Cradle Song (Op.27 no. 8)' => 'Kabalevsky, Dmitri',
			'Hunting Song (Op.68 no. 7)' => 'Schumann, Robert',
			'A Little Romance (Op.68 no. 19)' => 'Schumann, Robert',
			'Sweet Dreams (Op.39 no. 21)' => 'Tchaikovsky, Pyotr Il’yich',
			'Sweet Sorrow (Op.100 no. 16)' => 'Burgmüller, Johann Friedrich'
		],
		[
			'Little Prelude in D Minor, BWV 926' => 'Bach, Johann Sebastian',
			'Prelude in C Minor, BWV 999' => 'Bach, Johann Sebastian',
			'Sonata in A Major, K 83b' => 'Scarlatti, Domenico',
			'Toccata in C Minor' => 'Seixas, José Antonio Carlos de',
			'Sonata No. 5 in F Major, H 243' => 'Bach, Carl Philipp Emanuel',
			'Sonatina in F Major (no. 4)' => 'Clementi, Muzio',
			'Sonata in C Major, Hob. XVI:3' => 'Haydn, Franz Joseph',
			'Viennese Sonatina in C Major (no. 6)' => 'Mozart, Wolfgang Amadeus',
			'Andante (For children no. 32)' => 'Bartók, Béla',
			'Merriment (Mikrokosmos 3 no. 84)' => 'Bartók, Béla',
			'Waltz in A Minor, op. posth., B 150' => 'Chopin, Frédéric',
			'Prelude in C Minor, op. 28, no. 20' => 'Chopin, Frédéric',
			'Winter Scene' => 'Gillock, William',
			'Arietta (no. 1)' => 'Grieg, Edvard',
			'Fairy Tale (Op.27 no. 20)' => 'Kabalevsky, Dmitri',
			'Song without Words, op. 19, no. 4' => 'Mendelssohn, Felix',
			'Sentimental Waltz (Op.50 no. 13)' => 'Schubert, Franz',
			'Waltz (Op.39 no. 8)' => 'Tchaikovsky, Pyotr Il’yich',
			'Fluttering Leaves (Op.46 no. 11)' => 'Heller, Stephen'
		],
		[
			'Sonata in E Minor, Wq 62/12, H 66' => 'Bach, Carl Philipp Emanuel',
			'Little Prelude in F Major, BWV 927' => 'Bach, Johann Sebastian',
			'Invention No. 1 in C Major, BWV 772' => 'Bach, Johann Sebastian',
			'Allegro in B flat Major, from Sonata in B flat Major' => 'Seixas, José António Carlos de',
			'Sonatina in C Major (Op.36 no. 3)' => 'Clementi, Muzio',
			'Sonatina in D Major (Op.36 no. 6)' => 'Clementi, Muzio',
			'Sonatina in B flat Major, op. 168, no. 4' => 'Diabelli, Anton',
			'Sonata in E flat Major, Hob. XVI:28' => 'Haydn, Franz Joseph',
			'Scherzo in A Major (no. 45)' => 'Hummel, Johann Nepomuk',
			'Sonatina in G Major, op. 20, no. 2' => 'Kuhlau, Friedrich',
			'Sonatina in A Minor, op. 88, no. 3' => 'Kuhlau, Friedrich',
			'Viennese Sonatina in F Major (no. 5)' => 'Mozart, Wolfgang Amadeus',
			'Winter Solstice Song (no. 38) For Children, 2' => 'Bartók, Béla',
			'Polonaise in G Minor, op. posth., B 1' => 'Chopin, Frédéric',
			'Prelude in E Minor, op. 28, no. 4' => 'Chopin, Frédéric',
			'Arabesque sentimentale WIL' => 'Gillock, William',
			'Album-leaf (Op.12 no. 7)' => 'Grieg, Edvard',
			'Rondo–March (Op.60 no. 1)' => 'Kabalevsky, Dmitri',
			'To a Wild Rose' => 'MacDowell, Edward',
			'Venetian Boat Song (Op.30 no. 6)' => 'Mendelssohn, Felix',
			'Time Traveler' => 'Olson, Kevin',
			'Tarantella (Op.65 no. 4)' => 'Prokofiev, Sergei',
			'March of the Grasshoppers (Op.65 no. 7)' => 'Prokofiev, Sergei',
			'Sweet Elegy' => 'Rollin, Catherine',
			'Waltz in B Minor (no. 6)' => 'Schubert, Franz',
			'Sonata for the Young, op. 118, no. 1' => 'Schumann, Robert',
			'Song of the Lark (Op.39 no. 22)' => 'Tchaikovsky, Pyotr Il’yich',
			'Etude (Op.27 no. 3)' => 'Kabalevsky, Dmitri'
		],
		[
			'Little Prelude in F Major, BWV 928' => 'Bach, Johann Sebastian',
			'Invention No. 10 in G Major, BWV 781' => 'Bach, Johann Sebastian',
			'Invention No. 13 in A Minor, BWV 784' => 'Bach, Johann Sebastian',
			'Sonata in F Minor, K 185' => 'Scarlatti, Domenico',
			'Sonata in G Major, op. 49, no. 2' => 'Beethoven, Ludwig van',
			'Sonatina in E flat Major, WoO 47, no. 1' => 'Beethoven, Ludwig van',
			'Sonatina in G Major, op. 20, no. 2' => 'Kuhlau, Friedrich',
			'Sonata in C Major, K 545' => 'Mozart, Wolfgang Amadeus',
			'Humoreske in C Major, op. 6, no. 3' => 'Grieg, Edvard',
			'Puck (Op.71 no. 3)' => 'Grieg, Edvard',
			'At an Old Trysting-place' => 'MacDowell, Edward',
			'Valse mélancolique, op. 3, no. 3' => 'Rebikov, Vladimir',
			'Mazurka in A Minor, op. 7, no. 2' => 'Chopin, Frédéric',
			'Polonaise in A flat Major, op. posth., B 5' => 'Chopin, Frédéric',
			'Prelude in E Major, op. 28, no. 9' => 'Chopin, Frédéric',
			'Waltz in A flat Major, op. 69, no. 1' => 'Chopin, Frédéric',
			'Nocturne No. 5 in B flat Major, H 37' => 'Field, John',
			'Sonata for the Young, op. 118, no. 3' => 'Schumann, Robert',
			'Evening at the Village' => 'Bartók, Béla',
			'Toccatina No. 3' => 'Goolkasian Rahbee, Dianne',
			'Jimbo’s Lullaby (no. 2)' => 'Debussy, Claude',
			'Seven Good-humoured Variations on a Ukrainian Folk Song' => 'Kabalevsky, Dmitri',
			'Prelude Op.38 No. 8' => 'Kabalevsky, Dmitri',
			'Trois gymnopédies' => 'Satie, Eric',
			'Prelude Op.11 No. 22' => 'Scriabin, Alexander',
		],
		[
			'Sinfonias (Three-part Inventions)' => 'Bach, Johann Sebastian',
			'Prelude and Fugue in C Minor, BWV 847' => 'Bach, Johann Sebastian',
			'Capriccio sopra la lontananza del fratello dilettissimo, BWV 992' => 'Bach, Johann Sebastian',
			'Suite No. 1 in B flat Major, HWV 434' => 'Handel, George Frideric',
			'Suite No. 4 in E Minor, HWV 429' => 'Handel, George Frideric',
			'Sonata in A Major, K 209' => 'Scarlatti, Domenico',
			'Sonata in E Major, K 380' => 'Scarlatti, Domenico',
			'Sonata in F Minor, Wq 57/6, H 173' => 'Bach, Carl Philipp Emanuel',
			'Sonata in C Major, WoO 51' => 'Beethoven, Ludwig van',
			'Neun Variationen über das Thema “Quant’ è più bello,” WoO 69' => 'Beethoven, Ludwig van',
			'Sonata in B flat Major, Hob. XVI:2' => 'Haydn, Franz Joseph',
			'Sonata in E Minor, Hob. XVI:34' => 'Haydn, Franz Joseph',
			'Fantasia in D Minor, K 397 (385g)' => 'Mozart, Wolfgang Amadeus',
			'Sonata in G Major, K 283 (189h)' => 'Mozart, Wolfgang Amadeus',
			'Sonata in B flat Major, K 570' => 'Mozart, Wolfgang Amadeus',
			'Sonata in C Major, K 330 (300h)' => 'Mozart, Wolfgang Amadeus',
			'Intermezzo in A Minor, op. 76, no. 7' => 'Brahms, Johannes',
			'Mazurka in F sharp Minor, op. 6, no. 1' => 'Chopin, Frédéric',
			'Nocturne in F Minor, op. 55, no. 1' => 'Chopin, Frédéric',
			'Prelude in D flat Major, op. 28, no. 15' => 'Chopin, Frédéric',
			'Waltz in D flat Major, op. 64, no. 1' => 'Chopin, Frédéric',
			'Consolation No. 4' => 'Liszt, Franz',
			'Erotik (Op.43 no. 5)' => 'Grieg, Edvard',
			'Song without Words, op. 19, no. 1' => 'Mendelssohn, Felix',
			'Song without Words, op. 38, no. 2' => 'Mendelssohn, Felix',
			'Song without Words, op. 62, no. 1' => 'Mendelssohn, Felix',
			'Song without Words, op. 102, no. 4' => 'Mendelssohn, Felix',
			'Tarantella in A Minor (no. 1)' => 'Pieczonka, Albert',
			'Impromptu in A flat Major (Op.142 no. 2)' => 'Schubert, Franz',
			'Schlummerlied (Op.124 no. 16)' => 'Schumann, Robert',
			'Toccatina in B flat Major' => 'Smetana, Bedřich',
			'May (May Night) (Op.37b no. 5)' => 'Tchaikovsky, Pyotr Il’yich',
			'Golliwogg’s Cake-Walk (no. 6)' => 'Debussy, Claude',
			'La fille aux cheveux de lin (no. 8)' => 'Debussy, Claude',
			'Prelude No. 3' => 'Goolkasian Rahbee, Dianne',
			'Andaluza (Playera) (no. 5)' => 'Granados, Enrique',
			'Prelude Op.38 No. 12' => 'Kabalevsky, Dmitri',
			'Sonatina' => 'Khachaturian, Aram',
			'Bagatelles, op. 5' => 'Tcherepnin, Alexander',
			'O Polichinelo' => 'Villa-Lobos, Heitor',
			'Restless (Inquiétude) (Op.77 no. 4)' => 'Moszkowski, Moritz',
			'Etude in D Major (no. 3)' => 'Heller, Stephen',
		],
		[
			'Prelude and Fugue in C Major, BWV 846' => 'Bach, Johann Sebastian',
			'Prelude and Fugue in G Minor, BWV 861' => 'Bach, Johann Sebastian',
			'Prelude and Fugue in B flat Major, BWV 866' => 'Bach, Johann Sebastian',
			'Prelude and Fugue in B Major, BWV 868' => 'Bach, Johann Sebastian',
			'Prelude and Fugue in C Minor, BWV 871' => 'Bach, Johann Sebastian',
			'Prelude and Fugue in E Major, BWV 878' => 'Bach, Johann Sebastian',
			'Prelude and Fugue in A Minor, BWV 889' => 'Bach, Johann Sebastian',
			'English Suite No. 2 in A Minor, BWV 807' => 'Bach, Johann Sebastian',
			'French Suite No. 5 in G Major, BWV 816' => 'Bach, Johann Sebastian',
			'Sonata in F Major, op. 10, no. 2' => 'Beethoven, Ludwig van',
			'Sonata in D Major, op. 28' => 'Beethoven, Ludwig van',
			'Sonata in F Major, K 280 (189e)' => 'Mozart, Wolfgang Amadeus',
			'Sonata in C Major, K 309' => 'Mozart, Wolfgang Amadeus',
			'Ballade in D Minor, op. 10, no. 1' => 'Brahms, Johannes',
			'Intermezzo in B flat Minor, op. 117, no. 2' => 'Brahms, Johannes',
			'Intermezzo in E Minor, op. 119, no. 2' => 'Brahms, Johannes',
			'Mazurka in B flat Minor, op. 24, no. 4' => 'Chopin, Frédéric',
			'Nocturne in F sharp Major, op. 15, no. 2' => 'Chopin, Frédéric',
			'Prelude in C sharp Minor, op. 45' => 'Chopin, Frédéric',
			'Polonaise in C sharp Minor, op. 26, no. 1' => 'Chopin, Frédéric',
			'Trois écossaises, op. posth. 72' => 'Chopin, Frédéric',
			'Vanished Days (Op.57 no. 1)' => 'Grieg, Edvard',
			'Liebestraum No. 1, S 541/1' => 'Liszt, Franz',
			'Consolation No. 3' => 'Liszt, Franz',
			'Spinning Song, op. 67, no. 4' => 'Mendelssohn, Felix',
			'Song without Words, op. 53, no. 1' => 'Mendelssohn, Felix',
			'Impromptu in A flat Major (no. 4)' => 'Schubert, Franz',
			'Novelletten, op. 21' => 'Schumann, Robert',
			'December (Christmas) (Op.37 no. 12)' => 'Tchaikovsky, Pyotr Il’yich',
			'Deux arabesques' => 'Debussy, Claude',
			'Children’s Corner' => 'Debussy, Claude',
			'Bruyères (no. 5)' => 'Debussy, Claude',
			'Suite bergamasque' => 'Debussy, Claude',
			'Morceaux de fantasie, op. 3' => 'Rachmaninoff, Sergei',
			'Prelude in A flat Major (Op.8 no. 8)' => 'Rachmaninoff, Sergei',
			'Prelude Op.11 No. 11' => 'Rachmaninoff, Sergei',
			'Le tombeau de Couperin Prelude' => 'Ravel, Maurice',
			'Prelude Op.11 No. 4' => 'Scriabin, Alexander',
			'Prelude Op.11 No. 14' => 'Scriabin, Alexander',
			'Romanian Folk Dances, Sz 56' => 'Bartók, Béla',
			'Sonatina in C Major, op. 13, no. 1' => 'Kabalevsky, Dmitri',
			'Three Fantastic Dances, op. 5' => 'Shostakovich, Dmitri',
			'Etude in F Major (Op.45 no. 14)' => 'Heller, Stephen',
			'Étude-tableau (Op.33 no. 8)' => 'Rachmaninoff, Sergei',
			'Etude in E Major (Op.105 no. 9)' => 'Burgmüller, Johann Friedrich',
			'Etude in F Minor (Op.25 sno. 2)' => 'Chopin, Frédéric'
		]
	];

	protected $abrsm = [
		[
			'Minuet in C (from First Book of Progressive Lessons)' => 'Duncombe',
			'Air in A minor' => 'W. F. Bach',
			'Quadrille' => 'Haydn',
			'A Lovely Day' => 'Türk',
			'Quasi adagio (No. 3 from For Children, Vol. 1)' => 'Bartók'
		],
		[
			'Lesson in C (No. 10 from Die ersten 12 Lektionen, Op. 125)' => 'Diabelli',
			'Musette in D, BWV Anh. II 126' => 'Anon',
			'Arietta in F (from An Introduction to the Art of Playing on the Pianoforte)' => 'Clementi',
			'Allegro (4th movt from Sonata in G, Hob. XVI:8)' => 'Haydn',
			'Arabesque (No. 2 from 25 études faciles et progressives, Op. 100)' => 'Burgmüller',
			'Waltz (No. 13 from 24 Easy Pieces, Op. 39)' => 'Kabalevsky',
			'Night Journey (No. 65 from The First Steps of the Young Pianist, Op. 82)' => 'Gurlitt',
			'A Memory of Paris' => 'Gillock',
		],
		[
			'German Dance' => 'Haydn',
			'Menuett in F, K. 5' => 'Mozart',
			'Allegretto grazioso (No. 11 from Kleine Blumen, Op. 205)' => 'Gurlitt',
			'Old French Song (No. 16 from Album for the Young, Op. 39)' => 'Tchaikovsky',
			'Dance (No. 8 from For Children, Vol. 2)' => 'Dance (No. 8 from For Children, Vol. 2)'
		],
		[
			'Bagatelle in C, WoO 54' => 'Bagatelle in C, WoO 54',
			'Sonatina in A minor' => 'Benda',
			'Minuet (5th movt from French Suite No. 3 in B minor, BWV 814)' => 'J. S. Bach',
			'Scherzo: Allegro (2nd movt from Sonatina in G, Op. 151 No. 1' => 'Diabelli',
			'Finale: Presto (3rd movt from Sonata in A, Hob. XVI:26)' => 'Haydn',
			'Arietta Op. 12 No. 1' => 'Grieg',
			'Morning Prayer (No. 1 from Album for the Young, Op. 39)' => 'Tchaikovsky',
		],
		[
			'Aria (4th movt from Partita No. 4 in D, BWV 828)' => 'J. S. Bach',
			'Andante in A, Hob. I:53/II' => 'Haydn',
			'Allegro in A' => 'W. F. Bach',
			'Allegretto grazioso (2nd movt from Sonatina in C, Op. 55 No. 3)' => 'Kuhlau',
			'Joueur de harpe (No. 8 from Bagatelles, Op. 34)' => 'Sibelius',
			'Poco lento (No. 5 from L’Organiste, Vol. 1)' => 'Franck',
			'Erinnerung (No. 28 from Album für die Jugend, Op. 68)' => 'Schumann',
			'Valse Tyrolienne (No. 1 from Villageoises)' => 'Poulenc',
		],
		[
			'Fugue in G (from Prelude and Fugue in G, BWV 902)' => 'J. S. Bach',
			'Allegro (1st movt from Sonatina in Eb, Op. 19 No. 6)' => 'J. L. Dussek',
			'Menuet 1 and Menuet 2 (from Partita No. 1 in Bb, BWV 825)' => 'J. S. Bach',
			'Rondo: Vivace (3rd movt from Sonatina in G, Op. 88 No. 2)' => 'Kuhlau',
			'Prelude in B minor (No. 6 from 24 Preludes, Op. 28)' => 'Chopin',
			'Scherzo in B- (No. 1 from Two Scherzos, D. 593)' => 'Schubert',
			'Feuille d’automne (No. 3 from Feuilles d’automne, Op. 29)' => 'Rebikov',
			'Sérénade sur l’eau (No. 10 from Petite suite en 15 images' => 'Ibert',
			'Prelude in F+ minor (No. 8 from 24 Preludes, Op. 34)' => 'Shostakovich'
		],
		[
			'Gigue (5th movt from Suite No. 8 in F minor, HWV 433)' => 'Handel',
			'Tempo di Minuetto (3rd movt from Sonata in Eb, Hob. XVI:49)' => 'Haydn',
			'Andante (2nd movt from Sonata in G, K. 283) P' => 'Mozart',
			'Allegro assai (1st movt from Sonata in G, H. 119, Wq. 62/19)' => 'C. P. E. Bach',
			'Giga (7th movt from Partita No. 1 in Bb, BWV 825)' => 'J. S. Bach',
			'Sonata in D minor, Kp. 1, L. 366' => 'D. Scarlatti',
			'Lied ohne Worte (No. 3 from Lieder ohne Worte, Op. 102)' => 'Mendelssohn',
			'Moderato grazioso (No. 7 from Buds and Blossoms, Op. 107)' => 'Gurlitt',
			'Allegro giocoso (1st movt from Sonatina)' => 'Khachaturian'
		],
		[
			'Sarabande and Gigue (4th and 6th movts from English Suite No. 2 in A minor, BWV 807)' => 'J. S. Bach',
			'Sonata in D, Kp. 214, L. 165' => 'D. Scarlatt',
			'Prelude and Fugue in A minor (No. 2 from 24 Preludes and Fugues, Op. 87)' => 'Shostakovich',
			'Prelude and Fugue in A minor, BWV 889' => 'J. S. Bach',
			'Praeludium (from Ludus Tonalis)' => 'Hindemith',
			'Fugue in Bb (from Prelude and Fugue in Bb, Op. 35 No. 6)' => 'Mendelssohn',
			'Sonata in D minor, R. 25' => 'Soler',
			'Presto alla tedesca (1st movt from Sonata in G, Op. 79)' => 'Beethoven',
			'Allegro moderato (1st movt from Sonata in E, D. 459)' => 'Schubert',
			'Moderato (1st movt from Sonata in C minor, Hob. XVI:20)' => 'Haydn',
			'Rondo: Allegretto (3rd movt from Sonata in F, K. 533)' => 'Mozart',
			'Nocturne in G minor, Op. 37 No. 1' => 'Chopin',
			'Voiles (No. 2 from Préludes, Book 1)' => 'Debussy',
			'Elégie (No. 1 from Morceaux de fantaisie, Op. 3)' => 'Rachmaninoff',
			'Cortège (No. 3 from Trois morceaux pour piano)' => 'L. Boulanger',
			'Intermezzo in Bb minor (No. 2 from Three Intermezzos, Op. 117)' => 'Brahms',
			'Scarf Dance, Op. 37 No. 3' => 'Chaminade'
		]
	];

	public function get($list)
	{
		if (property_exists($this, $list))
			return $this->$list;

		return null;
	}

	public function year($ranking)
	{
		return $this->year[$ranking];
	}
}
