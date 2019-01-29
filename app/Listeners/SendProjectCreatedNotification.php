<?php

namespace App\Listeners;

use App\Events\ProjectWasCreated;
use App\Mail\ProjectCreated as ProjectCreatedMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendProjectCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProjectWasCreated  $event
     * @return void
     */
    public function handle(ProjectWasCreated $event)
    {
        Mail::to($event->project->owner->email)->send(
            new  ProjectCreatedMail($event->project)
        );
    }
}
