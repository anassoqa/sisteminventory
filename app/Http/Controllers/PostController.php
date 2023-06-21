<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\tb_pro;
use App\Models\tb_grn;
use App\Models\tb_stock;
use App\Models\tb_sin;
use App\Models\tb_sin_tmp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

use App\Models\tb_po;
use Dotenv\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use PHPUnit\TextUI\XmlConfiguration\Validator as XmlConfigurationValidator;
use Ramsey\Uuid\Rfc4122\Validator as Rfc4122Validator;

class PostController extends Controller
{
    public function pro(){
        $posts_pro = tb_pro::all();

        //render view with posts
        return view('pro', compact('posts_pro'));
    }
    public function store(Request $request)
    {
        //validate form
        $validator=FacadesValidator::make($request->all(), [
            'id'            => 'required',
            'nomor_pro'     => 'required|min:1',
            'nama_barang'   => 'required|min:1',
            'jumlah_barang' => 'required|min:1',
            'satuan'        => 'required|min:1',
            'departement'   => 'required|min:1',
            'remark'        => 'required|min:1',
            'tanggal'       => 'required|min:1',
            'status'        => 'required|min:1'
        ]);

        //create post
            $tb_pro['id']            = $request->id;
            $tb_pro['nomor_pro']     = $request->nomor_pro;
            $tb_pro['nama_barang']   = $request->nama_barang;
            $tb_pro['jumlah_barang'] = $request->jumlah_barang;
            $tb_pro['satuan']        = $request->satuan;
            $tb_pro['departement']   = $request->departement;
            $tb_pro['remark']        = $request->remark;
            $tb_pro['tanggal']       = $request->tanggal;
            $tb_pro['status']        = $request->status;
        
        tb_pro::create($tb_pro);
        //redirect to index
        return redirect()->route('pro')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function po(){
        $posts_po = tb_pro::where('status', 'New Order')->get();

        //render view with posts
        return view('po', compact('posts_po'));
    }
    public function store1( request $request){
        
        // dd($request->all());
        foreach($request->input('id') as $key => $value){
            tb_pro::where('id', $value)->update(['status'=> 'Purchasing']);            
         }
         $posts_po = tb_pro::where('status', 'Purchasing')->get();
        return View('storepo', compact('posts_po'));
    }
    public function storepo()
    {
        $posts_po = tb_pro::where('status', 'Purchasing')->get();

        return view('storepo', compact('posts_po'));
    }
    public function payment( request $request){
        
        // dd($request->all());
           // tb_pro::where('id',  $request->input('id'))->update(['status'=> 'Payment']);            
         
         $posts_payment = tb_pro::where('id', $request->input('id'))->get();
        return View('payment', compact('posts_payment'));
    }
    public function store_payment( request $request){
        
        // dd($request->all());
        
         tb_pro::where('id', $request->id)->update([
            'nama_barang'=> $request->input('nama_barang'),
            'jumlah_barang'=> $request->input('jumlah_barang'),
            'satuan'=> $request->input('satuan'),
            'harga'=> $request->input('harga')
        
        ]);
         
         $posts_po = tb_pro::where('status', 'Purchasing')->get();
        return View('storepo',compact('posts_po'));
    }
    

    public function shipment(){
        
        tb_pro::where('Status', 'Purchasing')->update(['status'=> 'On Shipment']); 
        $posts_po = tb_pro::where('status', 'New Order')->get();

        Return redirect()->route('po');
       
    }
    public function grn(){
        return View('grn', );
    }

    public function shipment_list(){
        $post_grn = tb_pro::where('status', 'On Shipment')->get();
        return View('shipment_list', Compact('post_grn'));
    }

    public function grn_report(){
        $tb_grn = DB::table('tb_grns')
            ->leftjoin('tb_pros', 'tb_grns.id_barang', '=', 'tb_pros.id')
            ->get();
        return View('grn_report', Compact('tb_grn'));
    }

    public function store_grn( request $request){
        
        // dd($request->all());
        foreach($request->input('id') as $key => $value){
            tb_pro::where('id', $value)->update(['status'=> 'Procces Received']);            
         }
         $post_grn = tb_pro::where('status', 'Procces Received')->get();
        return View('store_grn',compact('post_grn'));
    }
    public function post_grn(request $request){
        $index= 0;
        foreach($request->input('id') as $key => $value){
            $id         = tb_pro::where('id', $value)->value('id');
            $jml_brg    = tb_pro::where('id', $value)->value('jumlah_barang');
            $harga      = tb_pro::where('id', $value)->value('harga');
            if ($request->input('jumlah_barang') != $jml_brg){
                
                $int_qty = value($request->input('jumlah_barang'),$index);
                $missing = $jml_brg - $int_qty[$index];
                $str_qty = 'Missing : '.(string)$missing.', Received : '.(string)$int_qty[$index];
                
                tb_pro::where('id', $value)->update([
                    'status'=> $str_qty,
                    'jumlah_barang' => $int_qty[$index]
                ]);
                
            $tb_grn['tanggal_grn']      = Carbon::now();
            $tb_grn['id_barang']    = $id;
            $tb_grn['harga']        = $harga;
            $tb_grn['jumlah']       = $int_qty[$index];
            tb_grn::create($tb_grn);
            $tb_stock['id_barang']    = $id;
            tb_stock::create($tb_stock);
            $index++;
            }else{
                tb_pro::where('id', $value)->update(['status'=> 'Received']);   
            }
         }
         Return redirect()->route('shipment_list');
    }
  
    public function sin(){
        $tb_sin_temp = DB::table('tb_sin_tmps')
        ->leftjoin('tb_pros', 'tb_sin_tmps.id_barang', '=', 'tb_pros.id')
        ->leftjoin('tb_grns', 'tb_sin_tmps.id_barang', '=', 'tb_grns.id_barang')
        ->get();
        return View('sin', compact('tb_sin_temp'));
    }
    public function post_sin(){
        $tb_sin_temp = tb_sin_tmp::all();
        foreach ($tb_sin_temp as $key ) {
            
        }
        return View('sin');
    }
    public function post_temp_sin(Request $request){
        $dd =$request->input('id');
        $tb_sin_temp['id_barang']        = $dd;
        $tb_sin_temp['jumlah_sin']        = $request->input('jumlah_out');
        $tb_sin_temp['id_sin']        = $dd;
        tb_sin_tmp::create($tb_sin_temp);
        return View('sin');
    }
    public function store_sin_tmp(Request $request){
        $id = value($request->input('search'),2);
        $post_id = DB::table('tb_stocks')
            ->leftjoin('tb_pros', 'tb_stocks.id_barang', '=', 'tb_pros.id')
            ->leftjoin('tb_grns', 'tb_stocks.id_barang', '=', 'tb_grns.id_barang')
            ->where('tb_grns.id_barang', '=', $id)
            ->get();
            //dd($request->all());
        return view('store_sin_tmp', compact('post_id'));
    }
    
    public function dashboard(){
        return View('dashboard');
    }

    public function stock(){
        
        $tb_stock = DB::table('tb_stocks')
            ->leftjoin('tb_pros', 'tb_stocks.id_barang', '=', 'tb_pros.id')
            ->leftjoin('tb_grns', 'tb_stocks.id_barang', '=', 'tb_grns.id_barang')
            ->get();
        return View('stock', Compact('tb_stock'));
    }
    public function create_pro(){
        return View('create_pro');
    }
    public function layout(){
        return View('main.layout');
    }
}
