<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use ReflectionClass;

class DashboardController extends Controller
{
    public function index()
    {
        $skills = $this->desiredData(Skill::class);
        $portfolios = $this->desiredData(Portfolio::class);
        $blogs = $this->desiredData(Blog::class);
        $messages = $this->desiredData(Message::class);
        return view('admin.dashboard.dashboard', compact('skills', 'portfolios', 'blogs', 'messages'));
    }

    private function desiredData($class)
    {
        /**
         * @var Collection
         */
        $data = ($class)::orderBy('created_at', 'desc')->get();
        $dataCount = $data->count();
        $lastFiveData = $data->slice(0, 5);

        return [
            'count' => $dataCount,
            'lastFiveData' => $lastFiveData,
        ];
    }
}
