<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Department;
use App\Models\Unit;
use App\Models\Location;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function index(Request $request,$department)
    {
        if($request->orderby){
            $order_by=$request->orderby;
            $products = Product::where('departamento', $department)->orderby($order_by)->with('unity')->paginate(24);
        }else{
            $products = Product::latest()->where('departamento', $department)->with('unity')->paginate(24);
        }
        
        $departments = Department::all();
        return view('products.index', [
            'products' => $products,
            'departments' => $departments,
            'id_department' => $department

        ]);
    }

    public function show()
    {
        $categories = Category::all()->where('status','1');
        $departments = Department::all()->where('status','1');
        $unities = Unit::all()->where('status','1');
        $locations = Location::all()->where('status','1');

        return view('products.add', [
            'unities' => $unities,
            'departments' => $departments,
            'categories' => $categories,
            'locations' => $locations,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'cantidad' => $request->quantity,
            'codigo' => $request->code,
            'nombre' => $request->name,
            'precio_adquirido' => $request->purchasedprice,
            'precio_mayoreo' => $request->wholesaleprice,
            'precio_menudeo' => $request->retailprice,
            'precio_menudeo' => $request->retailprice,
            'unidad_medida' => $request->unit,
            'departamento' => $request->department,
            'categoria' => $request->category,
            'status' =>  $request->status,
            'locacion' => $request->location,
            'created_by' => 1
        ]);

        if ($request->file('image1')) {
            $path = Storage::disk('public')->put('storage', $request->file('image1'));
            $product->img = $path;
        }

        if ($request->file('image2')) {
            $path = Storage::disk('public')->put('storage', $request->file('image2'));
            $product->img2 = $path;
        }

        if ($request->file('image3')) {
            $path = Storage::disk('public')->put('storage', $request->file('image3'));
            $product->img3 = $path;
        }
        $product->save();
        return redirect()->route('products.index', 2)->with('info', 'Producto creado correctamente');
    }

    public function edit(Int $id)
    {
        $categories = Category::all()->where('status','1');
        $departments = Department::all()->where('status','1');
        $unities = Unit::all()->where('status','1');
        $product = Product::find($id);
        $locations = Location::all()->where('status','1');


        return view('products.edit', [
            'product' => $product,
            'unities' => $unities,
            'departments' => $departments,
            'categories' => $categories,
            'locations' => $locations
        ]);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->codigo = $request->code;
        $product->cantidad = $request->quantity;
        $product->nombre = $request->name;
        $product->precio_adquirido = $request->purchasedprice;
        $product->precio_mayoreo = $request->wholesaleprice;
        $product->precio_menudeo = $request->retailprice;
        $product->unidad_medida = $request->unit;
        $product->departamento = $request->department;
        $product->categoria = $request->category;
        $product->status = $request->status;
        $product->locacion = $request->location;

        if ($request->file('image1')) {
            Storage::disk('public')->delete($product->img);
            $path = Storage::disk('public')->put('storage', $request->file('image1'));
            $product->img = $path;
        }

        if ($request->file('image2')) {
            Storage::disk('public')->delete($product->img2);
            $path = Storage::disk('public')->put('storage', $request->file('image2'));
            $product->img2 = $path;
        }

        if ($request->file('image3')) {
            Storage::disk('public')->delete($product->img3);
            $path = Storage::disk('public')->put('storage', $request->file('image3'));
            $product->img3 = $path;
        }

        $product->save();
        return back()->with('info','Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {
        if ($product->img != "")
            Storage::disk('public')->delete($product->img);
        if ($product->img2 != "")
            Storage::disk('public')->delete($product->img2);
        if ($product->img3 != "")
            Storage::disk('public')->delete($product->img3);
        $product->delete();
        return redirect()->route('products.index', 2)->with('info', 'Producto eliminado correctamente');
    }
}
