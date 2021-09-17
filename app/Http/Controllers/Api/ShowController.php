<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Content;
use App\FileUpload;
use App\Http\Controllers\Controller;
use App\ReadWeb;
use App\Statistics;
use App\SubCategory;
use DateTime;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    public function ShowNew()
    {
        $date = date('Y-m-d H:i:s');
        $content = DB::select("SELECT
        contents.*, 
        sub_categories.category_id, 
        users.f_name, 
        users.l_name
    FROM
        contents
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
        INNER JOIN
        sub_categories
        ON 
            contents.type = sub_categories.id
    WHERE
        sub_categories.category_id = 6 AND
        contents.time_show <= '$date' AND
        (contents.hide_show >= '$date' OR contents.hide_show is NULL )
    ORDER BY
        contents.time_show DESC
    LIMIT 5");
        return response()->json($content);
    }
    public function ShowJob()
    {
        $content = DB::select("SELECT
        contents.*, 
        sub_categories.category_id, 
        users.f_name, 
        users.l_name, 
        file_uploads.url
    FROM
        contents
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
        INNER JOIN
        sub_categories
        ON 
            contents.type = sub_categories.id
        LEFT JOIN
        file_uploads
        ON 
            contents.id = file_uploads.id_content
    WHERE
        sub_categories.category_id <> 6 AND
        sub_categories.type <> 'document' AND
        file_uploads.type = 'image'
    GROUP BY
        contents.id
    ORDER BY
        contents.time_show DESC
    LIMIT 5");
        return response()->json($content);
    }
    public function ShowContentAllByCreate()
    {
        // $content = Content::latest()->get();
        $content = DB::select("SELECT
        users.f_name, 
        users.l_name, 
        contents.*
    FROM
        contents
        INNER JOIN
        users
        ON 
            contents.user_id = users.id");
        return response()->json($content);
    }
    public function ShowContentByUser($id_user)
    {
        // $content = Content::where('user_id', '=', $id_user)->latest()->get();
        $content = DB::select("SELECT
        users.f_name, 
        users.l_name, 
        contents.*
    FROM
        contents
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
    WHERE
        contents.user_id = '$id_user'");
        return response()->json($content);
    }
    public function ShowCateMageUser()
    {
        $category = Category::get();
        return response()->json($category);
    }
    public function ShowSubCateByCate($id)
    {
        $subcate = SubCategory::where('category_id', '=', $id)->get();
        return response()->json($subcate);
    }
    public function ShowImgNew()
    {
        $img = DB::table('contents')
            ->join('file_uploads', function ($join) {
                $join->on('contents.id', '=', 'file_uploads.id_content')
                    ->where('file_uploads.type', '=', 'image');
            })
            ->get();
        return response()->json($img);
    }
    public function ShowImageAll()
    {
        $data = FileUpload::where('type', '=', 'image')->get();
        return response()->json($data);
    }
    public function ShowImageByUser($id_user)
    {
        $img = DB::select('SELECT file_uploads.* FROM users 
        INNER JOIN contents 
            ON users.id = contents.user_id
        INNER JOIN
            file_uploads
            ON 
                contents.id = file_uploads.id_content
        WHERE
            users.id = ?', [$id_user]);
        return response()->json($img);
    }
    public function ShowContentById($id_content)
    {
        $data = DB::select('SELECT contents.*, users.f_name, users.l_name FROM contents 
                            INNER JOIN
                                users
                            ON 
                                contents.user_id = users.id
                            WHERE
                                contents.id = ?
                            LIMIT 1', [$id_content]);
        return response()->json($data);
    }
    public function ShowImageByIdContent($id_content)
    {
        $data = FileUpload::where('id_content', '=', $id_content)->get();
        return response()->json($data);
    }
    public function CheckPermissDetailContent(Request $request)
    {
        $id_user = $request->id_user;
        $id_content = $request->id_content;
        return response()->json();
    }
    public function DelOneImage($id_file)
    {
        $data = FileUpload::find($id_file);
        Storage::disk('public')->delete($data->url);
        $data->delete();
        return response()->json($data);
    }
    public function DelOneFile($id_file)
    {
        $data = FileUpload::find($id_file);
        Storage::disk('public')->delete($data->url);
        $data->delete();
        return response()->json($data);
    }
    public function PushStatis($id_content)
    {
        $check = Statistics::where('id_content', '=', $id_content)->first();
        if ($check == null) {
            $res = Statistics::create([
                'id_content' => $id_content,
            ]);
        } else {
            $push_static = $check->number_preview + 1;
            $res = $check->update([
                'number_preview' => $push_static
            ]);
        }

        return response()->json($res);
    }
    public function ShowStatisAll()
    {
        $data = Statistics::all();
        return response()->json($data);
    }
    public function ShowStatisByContent($id_content)
    {
        $data = Statistics::where('id_content', '=', $id_content)->first();
        return response()->json($data);
    }
    public function ShowOneCate($id_cate)
    {
        $data = Category::find($id_cate);
        return response()->json($data);
    }
    public function ShowContentByCate($id_cate)
    {
        $date = date('Y-m-d H:i:s');
        $data = DB::select("SELECT
        sub_categories.`name` AS sub_cate, 
        contents.user_id, 
        contents.title, 
        contents.type, 
        contents.detail, 
        contents.time_show, 
        sub_categories.category_id AS id_cate, 
        sub_categories.id AS id_subcate, 
        contents.id AS id_content, 
        statistics.number_preview, 
        users.f_name, 
        users.l_name
    FROM
        categories
        INNER JOIN
        sub_categories
        ON 
            categories.id = sub_categories.category_id
        INNER JOIN
        contents
        ON 
            sub_categories.id = contents.type
        INNER JOIN
        statistics
        ON 
            contents.id = statistics.id_content
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
    WHERE
        categories.id = '$id_cate' AND
        contents.time_show <= '$date' AND
        (contents.hide_show >= '$date' OR contents.hide_show is NULL )
    ORDER BY
        contents.time_show DESC");
        return response()->json($data);
    }
    public function ShowImageByIdCate($id_cate)
    {
        $data = DB::select("SELECT
        file_uploads.url, 
        contents.title, 
        contents.id AS id_content, 
        categories.id AS id_cate, 
        contents.type
    FROM
        categories
        INNER JOIN
        sub_categories
        ON 
            categories.id = sub_categories.category_id
        INNER JOIN
        file_uploads
        INNER JOIN
        contents
        ON 
            file_uploads.id_content = contents.id AND
            sub_categories.id = contents.type
    WHERE
        file_uploads.type = 'image' AND
        categories.id = '$id_cate'");
        return response()->json($data);
    }
    public function ShowOneSubCate($id_subcate)
    {
        $data = SubCategory::find($id_subcate);
        return response()->json($data);
    }
    public function ShowContentBySubCate($id_subcate)
    {
        $date = date('Y-m-d H:i:s');
        $data = DB::select("SELECT
        sub_categories.`name` AS sub_cate, 
        contents.user_id, 
        contents.title, 
        contents.type, 
        contents.detail, 
        contents.time_show, 
        sub_categories.category_id AS id_cate, 
        sub_categories.id AS id_subcate, 
        contents.id AS id_content, 
        statistics.number_preview, 
        users.f_name, 
        users.l_name
    FROM
        categories
        INNER JOIN
        sub_categories
        ON 
            categories.id = sub_categories.category_id
        INNER JOIN
        contents
        ON 
            sub_categories.id = contents.type
        INNER JOIN
        statistics
        ON 
            contents.id = statistics.id_content
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
    WHERE
        sub_categories.id = '$id_subcate' AND
        contents.time_show <= '$date' AND
        (contents.hide_show >= '$date' OR contents.hide_show is NULL )
    ORDER BY
        contents.time_show DESC");
        return response()->json($data);
    }
    public function ShowImageByIdSubCate($id_subcate)
    {
        $data = DB::select("SELECT
        file_uploads.url, 
        contents.title, 
        contents.id AS id_content, 
        categories.id AS id_cate, 
        contents.type
    FROM
        categories
        INNER JOIN
        sub_categories
        ON 
            categories.id = sub_categories.category_id
        INNER JOIN
        file_uploads
        INNER JOIN
        contents
        ON 
            file_uploads.id_content = contents.id AND
            sub_categories.id = contents.type
    WHERE
        file_uploads.type = 'image' AND
        sub_categories.id = '$id_subcate'");

        return response()->json($data);
    }
    public function ShowDocumentAll()
    {
        $data = DB::select("SELECT
        sub_categories.`name`, 
        sub_categories.id
    FROM
        sub_categories
        INNER JOIN
        contents
        ON 
            sub_categories.id = contents.type
    WHERE
        sub_categories.type = 'document'
    GROUP BY
        sub_categories.id");
        return response()->json($data);
    }
    public function ShowContentDoc($id_subcontent)
    {
        $data = DB::select("SELECT
        contents.title, 
        contents.id AS id_content, 
        sub_categories.id AS id_subcate, 
        file_uploads.`name` AS file_name, 
        file_uploads.url, 
        contents.created_at, 
        file_uploads.id AS id_file
    FROM
        contents
        INNER JOIN
        sub_categories
        ON 
            contents.type = sub_categories.id
        INNER JOIN
        file_uploads
        ON 
            contents.id = file_uploads.id_content
    WHERE
        sub_categories.type = 'document' AND
        file_uploads.type = 'file' AND
        sub_categories.id = '$id_subcontent'
    ORDER BY
        contents.created_at DESC
    LIMIT 5");
        return response()->json($data);
    }
    public function ShowFileBySubcate($id_subcate)
    {
        $data = DB::select("SELECT
        file_uploads.url, 
        file_uploads.`name`, 
        contents.title, 
        contents.detail, 
        file_uploads.id_content,
        file_uploads.created_at
    FROM
        sub_categories
        INNER JOIN
        contents
        ON 
            sub_categories.id = contents.type
        INNER JOIN
        file_uploads
        ON 
            file_uploads.id_content = contents.id
    WHERE
        sub_categories.id = '$id_subcate' AND
        file_uploads.type = 'file'");
        return response()->json($data);
    }
    public function ShowAddSumRead()
    {
        $date = date("Y-m-d");
        $check = DB::select("SELECT
            *
        FROM
            read_webs
        WHERE
            DATE(created_at) = '$date'");
        if (count($check) < 1) {
            $res = ReadWeb::create([
                'sum_read' => 1
            ]);
            return response()->json($res);
        } else {
            $res = ReadWeb::find($check[0]->id)->update([
                'sum_read' => $check[0]->sum_read + 1
            ]);
            return response()->json($res);
        }
    }
    public function ShowReadToDay()
    {
        $date = date("Y-m-d");
        $check = DB::select("SELECT
        *
    FROM
        read_webs
    WHERE
        DATE(created_at) = '$date'");
        return response()->json($check);
    }
    public function ShowReadToMount()
    {
        $date = date("Y-m");
        $check = DB::select("SELECT SUM(sum_read) AS sum_read FROM read_webs WHERE DATE_FORMAT(created_at,'%Y-%m') = '$date'");
        return response()->json($check);
    }
    public function ShowReadToAll()
    {
        $date = date("Y");
        $check = DB::select("SELECT SUM(sum_read) AS sum_read FROM read_webs ");
        return response()->json($check);
    }
    public function SearchContent(Request $request)
    {
        $date = date("Y-m-d");
        $data = DB::select("SELECT
        contents.*, 
        sub_categories.category_id, 
        users.f_name, 
        users.l_name, 
        statistics.number_preview
    FROM
        contents
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
        INNER JOIN
        sub_categories
        ON 
            contents.type = sub_categories.id
        INNER JOIN
        statistics
        ON 
            contents.id = statistics.id_content
    WHERE
        DATE(contents.created_at) <= '$date' AND
        contents.title LIKE '%$request->search%'
    ORDER BY
        contents.time_show DESC");
        return response()->json($data);
    }
    public function SearchContentByAdmin(Request $request)
    {

        $data = DB::select("SELECT
        contents.*, 
        sub_categories.category_id, 
        users.f_name, 
        users.l_name, 
        statistics.number_preview
    FROM
        contents
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
        INNER JOIN
        sub_categories
        ON 
            contents.type = sub_categories.id
        INNER JOIN
        statistics
        ON 
            contents.id = statistics.id_content
    WHERE        
        contents.title LIKE '%$request->search%'
    ORDER BY
        contents.time_show DESC");
        return response()->json($data);
    }
    public function SearchContentByUser(Request $request)
    {
        $data = DB::select("SELECT
        contents.*, 
        sub_categories.category_id, 
        users.f_name, 
        users.l_name, 
        statistics.number_preview
    FROM
        contents
        INNER JOIN
        users
        ON 
            contents.user_id = users.id
        INNER JOIN
        sub_categories
        ON 
            contents.type = sub_categories.id
        INNER JOIN
        statistics
        ON 
            contents.id = statistics.id_content
    WHERE
    contents.title LIKE '%$request->search%' AND
        users.id = '$request->id_user'
    ORDER BY
        contents.time_show DESC");
        return response()->json($data);
    }
    public function ShowImgPopup()
    {
        $data = DB::select("SELECT
        *
    FROM
        file_uploads
    WHERE
        file_uploads.type = 'popup'
    ORDER BY
	    file_uploads.id ASC");
        return response()->json($data);
    }
    public function ShowImgSlide()
    {
        $data = DB::select("SELECT
        *
    FROM
        file_uploads
    WHERE
        file_uploads.type = 'slide'
    ORDER BY
	    file_uploads.id ASC");
        return response()->json($data);
    }
    
}
