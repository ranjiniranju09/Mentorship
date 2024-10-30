<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Session',
            'date_field' => 'sessiondatetime',
            'field'      => 'session_title',
            'prefix'     => 'will start at',
            'suffix'     => '',
            'route'      => 'admin.sessions.edit',
        ],
        [
            'model'      => '\App\GuestLecture',
            'date_field' => 'guestsession_date_time',
            'field'      => 'guessionsession_title',
            'prefix'     => 'will start at',
            'suffix'     => '',
            'route'      => 'admin.guest-lectures.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (! $crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }
        $calendarSessions = [];
        foreach ($modules as $module) {
            $session = DB::table('sessions')
                ->where('modulename_id', $module->id)
                ->where('menteename_id', $menteeId)
                ->get();
    
            if ($session->isNotEmpty()) {
                $sessions[$module->id] = $session;
                foreach ($session as $s) {
                    $calendarSessions[] = [
                        'title' => $s->session_title, // Assuming there's a 'name' field for the session title
                        'start' => $s->sessiondatetime, // Date and time of the session
                        'url' => $s->sessionlink // Link to join the session
                    ];
                }
            } else {
                $sessions[$module->id] = [];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
