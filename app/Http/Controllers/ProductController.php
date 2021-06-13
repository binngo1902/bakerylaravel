<?php

namespace App\Http\Controllers;

use App\products;
use App\type_products;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ProductController extends Controller
{
    //
    public function getList(){
        $lists = products::all();
        return view('admin.product.list',compact('lists'));
    }

    public function getDelete($id){
        $list = products::find($id);
        if (file_exists('image/product/'.$list->image)){
        unlink('image/product/'.$list->image);
        }
        $list->delete();


        return redirect()->back()->with('msg','Đã xóa bánh '.$list->name.' thành công');
    }

    public function getEdit($id){
        $list = products::find($id);
        $types = type_products::all();
        return view('admin.product.edit',compact('list','types'));
    }


    public function postEdit(Request $request,$id){
        $this->validate($request,[
            'name' => 'required|',
            'unit_price' => 'required',
            'promotion_price' => 'required|lt:unit_price',
            'hinh' => 'mimes:jpeg,png,jpg',
            'unit' => 'required',
            'description'=>'required'


        ],[
            'name.required' => 'Bạn chưa nhập tên bánh',
            'name.unique' => 'Tên bánh đã tồn tại',
            'description.required' => 'Bạn chưa nhập mô tả loại bánh',
            'unit_price.required' => 'Bạn chưa nhập số tiền',
            // 'unit_price.integer' => 'Phải nhập số tự nhiên',
            'promotion_price.required' => 'Bạn chưa nhập số tiền giảm giá hoặc nhập 0',
            // 'promotion_price.integer' => 'Số tiền giảm giá phải là số tự nhiên',
            'promotion_price.lt' =>'Tiền giảm giá phải nhỏ hơn tiền gốc',
            // 'hinh.required' => 'Bạn chưa chọn hình',
            'hinh.mimes' => 'Hình chọn phải có đuôi là jpeg,png,jpg',
            'unit.required' => 'Bạn chưa nhập đơn vị bánh'
        ]);

        $product = products::find($id);

        $product->name = $request->name;
        $product->id_type = $request->id_type;
        if ($request->has('description')){
            $product->description = $request->description;
        }
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->new = $request->new;
        $product->unit = $request->unit;
        if($request->hasFile('hinh')){
            $file = $request->file('hinh');
            $name = $file->getClientOriginalName();

            $Hinh = time().'_'.$name;

            if (file_exists('image/product/'.$product->image)){
                unlink('image/product/'.$product->image);
            }
            $file->move('image/product/',$Hinh);
            $product->image = $Hinh;

        }
        $product->updated_at = new DateTime();
        $product->save();

        return redirect()->back()->with('msg','Bạn đã sửa thành công');

    }

    public function getAdd(){
        $types = type_products::all();
        return view('admin.product.add',compact('types'));
    }

    public function postAddproduct(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:products,name',
            'unit_price' => 'required',
            'promotion_price' => 'required|lt:unit_price',
            'hinh' => 'required|mimes:jpeg,png,jpg',
            'unit' => 'required',
            'description'=>'required'


        ],[
            'name.required' => 'Bạn chưa nhập tên bánh',
            'name.unique' => 'Tên bánh đã tồn tại',
            'description.required' => 'Bạn chưa nhập mô tả loại bánh',
            'unit_price.required' => 'Bạn chưa nhập số tiền',
            // 'unit_price.integer' => 'Phải nhập số tự nhiên',
            'promotion_price.required' => 'Bạn chưa nhập số tiền giảm giá hoặc nhập 0',
            // 'promotion_price.integer' => 'Số tiền giảm giá phải là số tự nhiên',
            'promotion_price.lt' =>'Tiền giảm giá phải nhỏ hơn tiền gốc',
            'hinh.required' => 'Bạn chưa chọn hình',
            'hinh.mimes' => 'Hình chọn phải có đuôi là jpeg,png,jpg',
            'unit.required' => 'Bạn chưa nhập đơn vị bánh'
        ]);

        $product = new products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->promotion_price = $request->promotion_price;
        $product->id_type = $request->id_type;
        $product->new = $request->new;
        $product->unit = $request->unit;

        $file = $request->file('hinh');
        $name = $file->getClientOriginalName();
        $Hinh = time().'_'.$name;
        $product->image = $Hinh;
        $file->move('image/product/',$Hinh);

        $product->created_at = new DateTime();
        $product->save();

        return redirect()->back()->with('msg','Bạn đã thêm thành công.');
    }


}
