<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;
use Session;

class PostController extends Controller
{
    public function addPost(){
        return view('admin.post.add_post');
    }

    public function savePost(Request $request){
        $request->validate([
            'name_post'=>'required',
            'content_post'=>'required',
            'post_status'=>'required|min:0|max:1',
        ],[
            'name_post.required'=> "Không được để trống tiêu đề",
            'content_post.required'=> "Bạn chưa điền nội dung bài viết",
            'post_status.required'=>'Bạn chưa thêm trạng thái sản phẩm cho bài viết',
        ]);

        $newPost = new PostModel();
        $newPost->title = $request->name_post;
        $newPost->content = $request->content_post;
        $newPost->status = $request->post_status;

        if ($request->hasFile("img_post")) { // Kiểm tra có tải ảnh lên chưa
            $file_image = $request->img_post;  // Nếu có -> gán biến giá trị file tải lên
            $extension = $file_image->getClientOriginalExtension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $file_image_name = rand(1, 100) .'-'. $file_image->getClientOriginalName();
                $file_image->move("public/upload/post", $file_image_name);  //Lấy giá trị tên + đuôi
                // Hàm move có chức năng di chuyên ảnh trong bộ nhớ tạm vào thư mục của local.
                $newPost->image = "/public/upload/post/" . $file_image_name;
            } else {
                $newPost->image = "/public/upload/post/demo.png";
            }
        } else {
            $newPost->image = "/public/upload/post/demo.png";
        }
        $newPost->save();
        Session::put("message", "Thêm bài viết thành công!");
        return redirect('admin/add-post');
    }

    public function allPost(){
        $all_post =  PostModel::all();
        return view('admin.post.all_post', ['all_post'=>$all_post]);
    }

    public function actionPost($id, $action){

        if($action == 'edit'){
            $post = PostModel::find($id);
            return view('admin.post.edit_post', ['post'=>$post]);
        }

        if($action == 'delete'){
            PostModel::where('id',$id)->delete();
            Session::put("message", "Xóa bài viết thành công");
            return back();
        }
    }

    public function editPost(Request $request, $id){
        $request->validate([
            'name_post'=>'required',
            'content_post'=>'required',
        ],[
            'name_post.required'=> "Không được để trống tiêu đề",
            'content_post.required'=> "Bạn không được để trống nội dung bài viết",
        ]);

        $savePost = array();
        $savePost['title'] = $request->name_post;
        $savePost['content'] = $request->content_post;

        if ($request->hasFile("img_post")) { // Kiểm tra có tải ảnh lên chưa
            $file_image = $request->img_post;  // Nếu có -> gán biến giá trị file tải lên
            $extension = $file_image->getClientOriginalExtension();
            if($extension == "png" || $extension == "jpg" || $extension == "jpeg"){
                $file_image_name = rand(1, 100) .'-'. $file_image->getClientOriginalName();
                $file_image->move("public/upload/post", $file_image_name);  //Lấy giá trị tên + đuôi
                // Hàm move có chức năng di chuyên ảnh trong bộ nhớ tạm vào thư mục của local.
                $savePost['image'] = "/public/upload/post/" . $file_image_name;
            }
        }
        Session::put("message", "Lưu bài viết thành công!");
        PostModel::where('id',$id)->update($savePost);
        return back();
    }

    public function changeStatusPost($id, $post_status){
        if ($post_status == 0) {
            PostModel::where("id", $id)->update(["status" => 1]);
            Session::put("message", "Đã bật chế độ riêng tư cho bài viết!");
        };
        if ($post_status == 1) {
            PostModel::where("id", $id)->update(["status" => 0]);
            Session::put("message", "Đã công khai bài viết thành công!");
        }
        return back();
    }
}
