<?php 
	namespace App\Http\Controllers\Admin;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\Input;
	use DB; 
	class PlanController extends Controller{

		public $normal= "正常播放";
		public $abnormal= "取消播放";
		
		public function movie_plan_list(){
			$data = DB::table('cinema')->paginate(5);
			return view('qiao/index',['data'=>$data]);
		}
		
		public function cinema_num(){
			$cinema_id = Input::all('cinema_id');
			$c_id = json_decode(json_encode($cinema_id),true);
			$cinema_id = (int)($c_id['cinema_id']);
			$cinema_data = DB::table('movie_house')->where('cinema_id','=',$cinema_id)->get();
			$movie_name  = DB::table('films')->select('film_name','film_id','time')->get();
            return view('qiao/cinema',[
							            'cinema_data' => $cinema_data,
							            'movie_name'  => $movie_name,
							            'cinema_id'	  => $cinema_id
							          ]);
		}
		public function house_setting(){
			$house_id = Input::get('house_id');
			$cinema_id = Input::get('cinema_id');
			// var_dump($cinema_id);die;
			// $house_id1 = (int)($house_id['house_id']);
			$sql = "SELECT MAX(next_movie_start) FROM house_setting WHERE house_id=".$house_id." GROUP BY house_id";
			$movie_start_object = DB::select($sql);
			if (!empty($movie_start_object)) {
				$movie_start_arr = json_decode(json_encode($movie_start_object),true);
				$next_movie_start = $movie_start_arr[0]['MAX(next_movie_start)'];
				$tt = $next_movie_start;
				
				$end = strtotime('23:30:00');
				$aa = strtotime($next_movie_start);

				$movie_name  = DB::table('films')->select('film_name','film_id')->get();
				return view('qiao/house',[
											'movie_name'		=>$movie_name,
											'house_id'			=>$house_id,
											'cinema_id'		    =>$cinema_id,
											'next_movie_start'  => $tt
										]);	
			}else{
				$movie_name  = DB::table('films')->select('film_name','film_id')->get();
				return view('qiao/house',[
											'movie_name'		=>$movie_name,
											'cinema_id'		    =>$cinema_id,
											'house_id'			=>$house_id
										]);
			}
		}

		public function ajax_moie_begin(){
			 if(Input::all('movie_id')){
	            $movie_id = Input::all('movie_id');
	            $film_id  = $movie_id['film_id'];
	            $kaishi   = $movie_id['movie_begin'];
	          	$movie_time = DB::table('films')->select('time')->where('film_id','=',$film_id)->get();
	          	$movie_time = json_decode(json_encode($movie_time),true);
	          	if (!empty($movie_time)) {
		          	$movie_time = (int)($movie_time[0]['time']);
					$clean = 17;		 		
					$time = explode(':',$kaishi);

					$hour = (int)($time[0]);  	
					$minute = (int)($time[1]);	

					$timetoday = strtotime(date("Y-m-d",time()));					
					$kaishishijian = $hour*60*60+$minute*60;				 		
					$movie_time1 = $movie_time*60;						 			
					$jieshushijian = date('Y-m-d H:i:s',$timetoday+$kaishishijian); 
					$rest = $clean*60;												
					$aa = $timetoday+$kaishishijian+$movie_time1;					
					$oo = $timetoday+$kaishishijian+$movie_time1+$rest;				
					$sanchang = date('H:i:s',$aa);										
					$kaishi = date('H:i:s',$oo);									
					$data['movie_leave'] = $sanchang;
					$data['next_movie_start'] = $kaishi;
					return $data;
	          	}else{
	          		return 1;
	          	}
	        }
		}

		public function addMovie(){
			$data = Input::all();
			$data['status'] = 1; //电影默认是正常播放状态
				$house_id = $data['house_id'];
				$cinema_id = $data['cinema_id'];
				if ($data) {
					unset($data['_token']);
				}
				$sql = "SELECT COUNT(house_id) FROM house_setting WHERE house_id = ".$house_id." GROUP BY house_id";
				$count_num_object = DB::select($sql);
				if (!empty($count_num_object)) {
					$num_arr = json_decode(json_encode($count_num_object),true);
					$num = $num_arr[0]['COUNT(house_id)'];
					if ($num>=7) {
					return '<script>alert("安排已满");location.href="'.'house_Setting_list?house_id='.$house_id.'";</script>';
					}else{
						$res = DB::table("house_setting")->insert($data);
						if($res){
				    		return '<script>alert("添加成功");location.href="'.'house_Setting_list?house_id='.$house_id.'&cinema_id='.$cinema_id.'";</script>';
				    	}
					}
				}else{
					$res = DB::table("house_setting")->insert($data);
					if($res){
			    		return '<script>alert("添加成功");location.href="'.'house_Setting_list?house_id='.$house_id.'&cinema_id='.$cinema_id.'";</script>';
			    	}
				}
					
		}

		public function house_Setting_list(){
			$house_id   = (int)(Input::get('house_id'));
			$cinema_id  = (int)(Input::get('cinema_id'));
			$movie_data = DB::TABLE('house_setting')
									->JOIN('films','house_setting.film_id','=','films.film_id')
									->select('id','film_name','movie_leave','house_id','movie_start','movie_leave','next_movie_start','movie_dangqi_start','movie_dangqi_stop','status')
									->WHERE('house_id','=',$house_id)
									->orderBy('movie_start', 'ASC')
									->get();
			return view('qiao/house_setting_list',[
													'movie_data' => $movie_data,
													'house_id'   => $house_id,
													'cinema_id'  => $cinema_id,

												]);
		}

		public function edit_setting(){
			$id 	= Input::get('id');
			$status = Input::get('status');
			$house_id = Input::get('house_id');
			if ($status == '正常播放') {
				$status = 0;
			}elseif($status == '取消播放'){
				$status = 1;
			}elseif ($status == 0 ) {
				$status = 1;
			}else{
				$status = 0;
			}
			$sql = "UPDATE house_setting SET STATUS =".$status." WHERE id =".$id;
			$res = DB::update($sql);
			if ($res) {
				$data = DB::TABLE('house_setting')
									->JOIN('films','house_setting.film_id','=','films.film_id')
									->select('id','film_name','movie_leave','house_id','movie_start','movie_leave','next_movie_start','movie_dangqi_start','movie_dangqi_stop','status')
									->WHERE('house_id','=',$house_id)
									->orderBy('movie_start', 'ASC')
									->get();
				$data = json_decode(json_encode($data),true);
				return $this->str($data,$house_id);
			}
		}


		public function str($data,$house_id){
			$str = "";
			
			foreach ($data as $key => $value) {
					if ($value['status'] == 1) {
						$str .= "<tr>";
					}else{
						$str .= "<tr style='color:red';>";
					}
					$str .= "<td>".$value['film_name']."</td>";
					$str .= "<td>".$value['house_id']."</td>";
					$str .= "<td>".$value['movie_start']."</td>";
					$str .= "<td>".$value['movie_leave']."</td>";
					$str .= "<td>".$value['next_movie_start']."</td>";
					$str .= "<td>".$value['movie_dangqi_start']."</td>";
					$str .= "<td>".$value['movie_dangqi_stop']."</td>";
					$str .= "<input type='hidden' value=".$house_id.">";
					$str .= "<input type='hidden' value=".$value['id']." id='hidden_id'>";
					if ($value['status'] == 1) {
						$str .= "<td>".$this->normal."</td>";
					}else{
						$str .= "<td>".$this->abnormal."</td>";
					}
					$str .= "<td><p class='btn' ><i class='fa fa-edit'></i>编辑</p></td>";
					$str .= "</tr>";
			}
			return $str;
		}

	}

 ?>