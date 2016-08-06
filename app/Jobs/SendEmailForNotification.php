<?php

namespace App\Jobs;

use App\Jobs\Job;

use Illuminate\Mail\Mailer;
use Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Entities\Book;
use App\Entities\User;


class SendEmailForNotification extends Job implements  ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $book;

    /**
     * Create a new job instance.
     *
     * @param Book $book
     * @internal param User $user
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

   /**
    * Execute the job.
    *
    */
    public function handle(Mailer $mailer) {
        $users = User::all();
        foreach ($users as $user) {
            $data = array('firstname' => $user->firstname,
                          'email' => $user->email,
                          'book_title' => $this->book['title'],
                          'book_author' => $this->book['author'],
                          'book_year' => $this->book['year'],
                          'book_genre' =>$this->book['genre']);

//            $mailer->send('emails.notification_new_book', $data, function ($message) use ($data) {
//                $message->from('sample@example.com', 'Sample');
//                $message->to($data['email'], $data['firstname'])
//                    ->subject('New book was added!');
//            });
        }
    }

    /**
     * Event on failing
     */
    public function failed()
    {
        \Log::info('Job failed: book '  . $this->book->id . ' not mailed'  );
    }
}

