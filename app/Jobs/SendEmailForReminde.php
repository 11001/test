<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Entities\Book;
use App\Entities\User;
use Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;

class SendEmailForReminde extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $book;
    protected $user;

    /**
     * Create a new job instance.
     *
     * @param  User $user
     * @param Book $book
     */
    public function __construct(User $user, Book $book)
    {
        $this->user = $user;
        $this->book = $book;
    }

    /**
     * Execute the job.
     * @param Mailer $mailer
     */
    public function handle(Mailer $mailer)
    {
        $book = $this->user->books->find($this->book->id);
        if ($book) { //check if user not return yet
            $data = array(
                'firstname' => $this->user['firstname'],
                'email' => $this->user['email'],
                'book_title' => $this->book['title'],
                'book_author' => $this->book['author'],
                'book_year' => $this->book['year'],
                'book_genre' => $this->book['genre']);

//            $mailer->send('emails.reminde_to_revert', $data, function ($message) use ($data) {
//                $message->from('sample@example.com', 'Sample');
//                $message->to($data['email'], $data['firstname'])->subject('Reminde');
//            });
        }
    }

    /**
     * Event on failing
     */
    public function failed()
    {
        \Log::info('Job failed: user '  . $this->user->id . ' not recieve mail'  );
    }

}
  

