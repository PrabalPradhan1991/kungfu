<?php

namespace App\Http\Controllers\CoreModules\Videos;

use \App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StagesController extends Controller
{
	private $model = '\App\Http\Controllers\CoreModules\Videos\VideosModel';
    private $view = 'core-modules.videos.backend.';
    private $frontend_view = 'core-modules.videos.frontend.';
    private $page_title = 'Videos';

    public function getListView() {
    	$data = \DB::table((new StageModel)->getTable())
    				->orderBy('ordering', 'ASC')	
    				->get();

    	return view($this->view.'list')
    			->with('data', $data);
    }

    public function getCreateView() {
    	return view($this->view.'create');
    }

    public function postCreateView() {
    	$input = request()->all();

    	\DB::beginTransaction();

    		$stage = StageModel::create($input['stage']);
    		
    		if(isset($input['video']['file'])) {
    			foreach($input['video']['file'] as $index => $v) {
    				VideoModel::create([
    					'title' => $input['video']['video_title'][$index],
    					'mime'	=>	$input['video']['mime'][$index],
    					'ordering'	=>	$index,
    					'stage_id'	=>	$stage->id,
    					'video_filename'	=>	$input['video']['file'][$index],
    				]);
    			}
    		}

    		if(isset($input['pdf']['file'])) {
    			foreach($input['pdf']['file'] as $index => $v) {
    				PdfModel::create([
    					'title' => $input['pdf']['pdf_title'][$index],
    					'mime'	=>	$input['pdf']['mime'][$index],
    					'ordering'	=>	$index,
    					'stage_id'	=>	$stage->id,
    					'pdf_filename'	=>	$input['pdf']['file'][$index],
    				]);
    			}
    		}
    		

    	\DB::commit();

    	session()->flash('success-msg', 'Stage successfully created');
    	return redirect()->back();
    }

    public function getEditView($id) {
    	$data = StageModel::where('id', $id)->firstOrFail();
    	return view($this->view.'edit')
    			->with('data', $data);
    }

    public function postEditView($id) {
    	$input = request()->all();
    	StageModel::where('id', $id)->update($input['stage']);

    	session()->flash('success-msg', 'Stage successfully edited');
    	return redirect()->back();
    }

    public function getAddVideos($id) {
    	$videos = VideoModel::where('stage_id', $id)->orderBy('ordering', 'ASC')->get();

    	return view($this->view.'videos')
    			->with('videos', $videos);
    }

    public function postAddVideos($id) {
    	$input = request()->all();
    	$max_ordering = VideoModel::where('stage_id', $id)->max('ordering') + 1;
    	if(isset($input['video']['file'])) {
			foreach($input['video']['file'] as $index => $v) {
				VideoModel::create([
					'title' => $input['video']['video_title'][$index],
					'mime'	=>	$input['video']['mime'][$index],
					'ordering'	=>	$index + $max_ordering,
					'stage_id'	=>	$id,
					'video_filename'	=>	$input['video']['file'][$index],
				]);
			}
		}
		session()->flash('success-msg', 'Videos successfully added');
		return redirect()->back();
    }

    public function getAddDocuments($id) {
    	$videos = PdfModel::where('stage_id', $id)->orderBy('ordering', 'ASC')->get();

    	return view($this->view.'pdfs')
    			->with('pdfs', $videos);
    }

    public function postAddDocuments($id) {
    	$input = request()->all();
    	$max_ordering = PdfModel::where('stage_id', $id)->max('ordering') + 1;
    	if(isset($input['pdf']['file'])) {
			foreach($input['pdf']['file'] as $index => $v) {
				PdfModel::create([
					'title' => $input['pdf']['pdf_title'][$index],
					'mime'	=>	$input['pdf']['mime'][$index],
					'ordering'	=>	$index + $max_ordering,
					'stage_id'	=>	$id,
					'pdf_filename'	=>	$input['pdf']['file'][$index],
				]);
			}
		}
		session()->flash('success-msg', 'Pdfs successfully added');
		return redirect()->back();
    }

    public function postDeleteVideoView($video_id) {
    	VideoModel::where('id', $video_id)->delete();
    	session()->flash('success-msg', 'video successfully deleted');
    	return redirect()->back();
    }

    public function postDeleteMultipleVideoView() {
    	$rids = request()->get('rid');
        $rids = is_null($rids) || empty($rids) ? [] : $rids;
        VideoModel::whereIn('id', $rids)->delete();
        session()->flash('success-msg', count($rids).' videos successfully deleted');
        return redirect()->back();
    }

    public function postDeletePdfView($pdf_id) {
    	PdfModel::where('id', $pdf_id)->delete();
    	session()->flash('success-msg', 'pdf successfully deleted');
    	return redirect()->back();
    }

    public function postDeleteMultiplePdfView() {
    	$rids = request()->get('rid');
        $rids = is_null($rids) || empty($rids) ? [] : $rids;
        PdfModel::whereIn('id', $rids)->delete();
        session()->flash('success-msg', count($rids).' pdfs successfully deleted');
        return redirect()->back();
    }

    public function postEditVideos() {
    	$input = request()->all();
    	//dd($input['video']);
    	if(isset($input['video'])) {
    		foreach($input['video'] as $video_id => $i) {
    			VideoModel::where('id', $video_id)->update($i);
    		}

    		session()->flash('success-msg', 'Videos successfully edited');
    	}
    	else {
    		session()->flash('warning-msg', 'No videos to edit');
    	}

    	return redirect()->back();
    }

    public function postEditPdfs() {
    	$input = request()->all();
    	if(isset($input['pdf'])) {
    		foreach($input['pdf'] as $pdf_id => $i) {
    			PdfModel::where('id', $pdf_id)->update($i);
    		}

    		session()->flash('success-msg', 'Pdfs successfully edited');
    	}
    	else {
    		session()->flash('warning-msg', 'No pdfs to edit');
    	}

    	return redirect()->back();	
    }

    public function getStageRequests() {
    	$stage_table = (new StageModel)->getTable();
    	$user_table = (new \App\User)->getTable();
    	$request_table = (new RequestModel)->getTable();

    	$data = \DB::table($request_table)
    				->join($stage_table.' as from_stage', 'from_stage.id', '=', $request_table.'.from_stage_id')
    				->join($stage_table.' as to_stage', 'to_stage.id', '=', $request_table.'.to_stage_id') 
    				->join($user_table, $user_table.'.id', '=', $request_table.'.user_id')
    				->select($request_table.'.*', 'name', 'from_stage.stage_name as from_stage', 'to_stage.stage_name as to_stage')
    				->orderBy('id', 'DESC')->get();

    	return view($this->view.'requests')
    			->with('data', $data);
    }

    public function postStageRequests($status, $request_id) {
    	//if accept add to user stage
    	$data = RequestModel::where('id', $request_id)->firstOrFail();
    	if($status == 'approved') {
    		$user_stage_record = UserStageModel::firstOrNew([
    			'user_id'	=>	$data->user_id
    		]);

    		$user_stage_record->stage_id = $data->to_stage_id;
    		$user_stage_record->save();
    		session()->flash('success-msg', 'User successfully promoted!');
    	} else {
    		session()->flash('success-msg', 'Request disapproved');
    	}

    	$data->delete();
    	
    	return redirect()->back();
    }

    public function postRequestAccess($stage_id) {
        $response = (new RequestModel)->requestAccess(\Auth::user()->id, $stage_id);

        if($response['status']) {
            session()->flash('success-msg', $response['message']);
        }
        else {
            session()->flash('frienldy-error-msg', $response['message']);
        }

        return redirect()->back();
    }

}