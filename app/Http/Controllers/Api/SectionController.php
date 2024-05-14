<?php

namespace App\Http\Controllers\Api;

use App\Models\Section;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListSectionsRequest;
use App\Http\Resources\SectionResource;

class SectionController extends Controller
{
	public function __invoke(ListSectionsRequest $request)
	{
		$sections = Section::where('class_id', $request->class_id)->get();

		return SectionResource::collection($sections);
		// $class_id = $request->class_id;

		// return SectionResource::collection(Section::where('class_id', $class_id)->get());
	}
}
