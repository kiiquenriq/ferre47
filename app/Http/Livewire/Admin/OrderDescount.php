<?php

namespace App\Http\Livewire\Admin;

use App\Models\Count;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class OrderDescount extends Component
{
    public $order, $content, $orders ,$rowId;

    public $prueba="", $error, $users, $user_id="";
    public $total, $cart=[];
    public $user, $item, $can, $ship, $acuenta;
   
    public $qty=1, $quantity, $product, $cantidad , $cant, $cambio, $falta;


    public $entregado, $js;

    public function mount(){
      $this->orders = Order::where('id', $this->order)->first();
      $this->users = User::all();
      
    }
    public $options =[
        'color_id'=> null,
        'size_id' => null,
        'codigo'=> null, 
        'barcode'=> null,
         

    ];

    protected $listeners = [
        'render',
        'scan-code' => 'scanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale'
    ];

    //scaner
    public function scanCode($barcode, $cantidad = 1){

        
        //busqueda de codigo de barras 
        $title="";
        $this->product = Product::where('barcode', $barcode)
                    ->orWhere('codigo', $barcode)->first(); //optional
        
        $order =$this->orders->entregado;
        $json = json_decode($order, true);
        foreach($json as $item){
            foreach($item as $i){ 
                
            }
        }
        
        // }

        //validacion 
        if($this->product == null) {
            $title="producto no encontrado";
            $this->error = $title;
            
            $this->emit('scan-notfound', 'El producto no fue encontrado');
            
        } else  {
            // if($this->InCart($product->id)) {
            //     $this->increaseQty($product->id);
            //     return;
            // } if ($product->quantity < 1){
            //     $this->emit('no-stock', 'no hay stock');
            //     return;
            // }

            foreach ($json as $item) {
                $quan = $item['rowId']; 
                $cel = $item['qty']; 
               
            }
            // dd($cel);
            
                        
            $this->options['image'] = Storage::url($this->product->images->first()->url);
            $this->options['codigo'] = $this->product->codigo;
            $this->options['barcode'] = $this->product->barcode;

                Cart::add([
                'id' => $this->product->id, 
                'name' => $this->product->name, 
                'qty' => $this->qty, 
                'price' => $this->product->price, 
                'weight' => 550,
                'codigo' => $this->product->codigo,
                
                'options' => $this->options
                
            ]);

           
           

            
            $this->total = Cart::subtotal();

            $this->emit('scan-ok', 'Producto agregado');

        }
    }
     //Eliminar carrito
     public function destroy(){
        Cart::destroy();
        $this->emitTo('dropdown-cart', 'render');
    }

    //borrar producto
     public function delete($rowId){
        Cart::remove($rowId);
        $this->emitTo('dropdown-cart', 'render');

    }


    public function save() {
        $hoy = date("d.m.y , g:i a");
        $content = Cart::content(); //content
        $ship = $this->ship; //status_shipped
        
        if($ship == 2 ){  //en camino
            $envio = 2; //envio
        } elseif ($ship == 3) {
            $envio  = 1; //tienda
        }


        
       $order = $this->orders;
        

       $id = $this->orders->id;
        $orderupdate =$this->orders->entregado; //
   
        $order->status_shipped  = $ship;
        $order->save();

        
        $count = new Count();
            $count->order_id = $id;
            $count->contenido = Cart::content();
        $count->save();
        
        
        // $order->save();
        // foreach(Cart::content() as $item ){
        //     discount($item); //helper descontar stock
        // }

        
        //impresora
        $nombreImpresora = "POS58";
        $conector = new WindowsPrintConnector($nombreImpresora);
        $impresora = new Printer($conector);
        $impresora->setJustification(Printer::JUSTIFY_CENTER);


        $impresora->setTextSize(2,2);
        $impresora->feed(6);
        $impresora->text('Ferreteria 47');
        $impresora->feed();
        
        $impresora->setTextSize(1,1);

        $impresora->text('Telefono: 55 28348300');
        $impresora->feed();
        $impresora->text('Comprobante de pago');
        $impresora->feed(1);
       

        $impresora->text('----------------');
        $impresora->feed(2);
       
        $impresora->setTextSize(2,2);
        $impresora->text('Orden: '.$order->id);
        $impresora->feed();
        $impresora->text('total:  $'. $this->total);
       
        $impresora->feed(2);
        $impresora->text('----------------');
        $impresora->feed(2);
        $impresora->setTextSize(1,1);

        $impresora->text('Falta pagar : '. $order->Acuenta);
        $impresora->feed();
        $impresora->text('Nombre: '.$order->name);
        $impresora->feed();
        $impresora->text($hoy);
        $impresora->feed();
        $impresora->text('----------------');


        $impresora->feed(2);
        $impresora->text('Entregado en esta orden');
        $impresora->feed(2);
        foreach($content as $item){
        
        $impresora->text(  $item->qty.'   '.$item->name);
      
        $impresora->feed();
        $impresora->text('----------------------');
        $impresora->feed();
           
        }

       
        $impresora->setTextSize(1,2);
        $impresora->text('Gracias por tu compra');
       
        

        $impresora->feed(8);
       
        $impresora->cut();
        $impresora->close();
        

        Cart::destroy();

        





        

    }



    public function render()
    {   
        $decode =$this->orders->content;
        
        $data = json_decode($decode);
        // var_dump($data);

         
     
        
        return view('livewire.admin.order-descount', with(compact('data')))->layout('layouts.admin');
    }
}
