<?php

namespace App\Http\Controllers;

use App\type_products;
use DateTime;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class TypeController extends Controller
{
    //


    public function getList(){
        $types = type_products::all();
        return view('admin.type_product.list',compact('types'));
    }
    public function getAdd(){
        return view('admin.type_product.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:type_products,name',
            'description' => 'required',
            'Hinh' => 'required|mimes:jpeg,png,jpg|image'

        ],[
            'name.required' => 'Bạn chưa nhập tên loại bánh',
            'name.unique' => 'Tên loại bánh đã tồn tại',
            'description.required' => 'Bạn chưa nhập mô tả loại bánh',
            'Hinh.required' => 'Bạn chưa chọn hình',
            'Hinh.mimes' => 'Hình chọn phải có đuôi là jpeg,png,jpg'
        ]);

        $type = new type_products();
        $type->name = $request->name;
        $type->description = $request->description;

        $file = $request->file('Hinh');
        $name = $file->getClientOriginalName();
        $Hinh = time().'_'.$name;
        $type->image = $Hinh;
        $file->move('image/product/',$Hinh);

        $type->save();
        return redirect()->back()->with('msg','Thêm thông tin thành công');
    }

    public function getDelete($id){
        $type = type_products::find($id);
        $type->delete();
        unlink("image/product/".$type->image);

        return redirect()->back()->with('msg','Bạn đã xóa '.$type->name.' thành công.');

    }

    public function getEdit($id){
        $type = type_products::find($id);
        return view('admin.type_product.edit',compact('type'));
    }

    public function postEdit(Request $request,$id){
        $type = type_products::find($id);
        $this->validate($request,[
            'name' => 'required|unique:type_products,name',
            'description' => 'required',
            'Hinh' => 'nullable|mimes:jpeg,png,jpg|image'

        ],[
            'name.required' => 'Bạn chưa nhập tên loại bánh',
            'name.unique' => 'Tên loại bánh đã tồn tại',
            'description.required' => 'Bạn chưa nhập mô tả loại bánh',
            // 'Hinh.required' => 'Bạn chưa chọn hình',
            'Hinh.mimes' => 'Hình chọn phải có đuôi là jpeg,png,jpg'
        ]);

        $type->name = $request->name;
        $type->description = $request->description;
        $type->updated_at = new DateTime();
        if ($request->hasFile('Hinh')){
            $file = $request->file('Hinh');
            $name = $file->getClientOriginalName();
            $Hinh = time().'_'.$name;
            unlink('image/product/'.$type->image);
            $file->move('image/product/',$Hinh);
            $type->image = $Hinh;
        }
        $type->save();

        return redirect()->back()->with('msg','Bạn đã sửa thành công');


    }
}
