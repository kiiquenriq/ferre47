<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Paid;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\ElseIf_;

class Ventas extends Component
{

    public $prueba="", $error, $users, $user_id="";
    public $total, $cart=[];
    public $user, $item, $can, $ship, $acuenta;
    public $name, $address, $pago;
   
    public $qty=1, $quantity, $product, $cantidad , $cant, $cambio, $falta;
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
        
        //  $this->quantity= Product::where('barcode', $barcode )->first()->qty; 
        $this->prueba = $this->product['quantity'];
      

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
                
             $this->quantity = qty_available($this->product->id);            
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

    //obtener mount()-> usuarios
    public function mount(){
         
        $this->users = User::all();

    }

    //analiza si esta por cobrar, pagado y cuanto dinero esta a cuenta
    public function update(){

        $this->user_id;//usuario
        $this->cant; //cantidad input
        $this->total = Cart::subtotal(2,'.',''); //this total
        $item = Cart::content();  //contenido

        $this->acuenta = $this->total; //acuenta
       
        //cantidad mostrara si el producto es pagado o no

        if($this->cant < $this->total) {   //
            $this->cambio = 0 ;
            $this->falta = $this->total- $this->cant;
            $this->acuenta = $this->total - $this->falta;
            $this->pago = $this->cant;
            

        } elseif($this->cant == $this->total) {
            $this->cambio = $this->cant - $this->total ;
            $this->falta = 0;
            $this->acuenta = 0;
            $this->pago = $this->total;

        }elseif($this->cant > $this->total) {

            $this->cambio = $this->cant - $this->total;
            $this->falta = 0;
            $this->acuenta = 0;
            $this->pago = $this->total;
        }

    }

    public function save() {
        
        if($this->cant < $this->total) {   //
        
            $this->pago = $this->cant;
            

        } elseif($this->cant == $this->total) {
        
            $this->pago = $this->total;

        }elseif($this->cant > $this->total) {

            $this->pago = $this->total;
        }
        
        $user = User::where('id', $this->user_id)->first();
       
        
        if($user->id == 1) {
            $name = $this->name;
            
        }else {
            $name = $user->name;
           
        }

        

        
        $this->user_id;
        
        
        $telefono = $user->telefono;
        $address = $user->address;
        $references = $user->references;
        $cp = $user->cp;
        $state = $user->state;
        $city = $user->city;
        $colonia = $user->colonia;

        $ship = $this->ship; //status_shipped
        
        if($ship == 2 ){  //en camino
            $envio = 2; //envio
        } elseif ($ship == 3) {
            $envio  = 1; //tienda
        }

        $cost = 0; //shipping_cost

        if($this->falta == 0) {
            $paid = "7";
            
        } else {
            $paid = "8";
            
        }
        $this->total; //total
        

       
        //status_paid

        $content = Cart::content(); //content

       
        $order = new Order();

        $order->user_id = $this->user_id;
        $order->Acuenta = $this->acuenta;
        $order->name = $name;
        $order->address = $address;
        $order->references = $references;
        $order->cp = $cp;
        $order->state = $state;
        $order->city = $city;
        $order->colonia = $colonia;
        $order->telefono = $telefono;
        $order->envio_type = $envio;
        $order->shipping_cost = $cost;
        $order->total = $this->total;
        $order->status_shipped = $ship;
        $order->status_paid = $paid;

        $order->content = Cart::content();
        $order->entregado = Cart::content();

        $order->save();

      
        foreach(Cart::content() as $item ){

            discount($item); //helper descontar stock
        }

        $paid = new Paid();

            $paid->order_id = $order->id;
            $paid->Acuenta = $this->pago;
        $paid->save();

        
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

        $impresora->text('Falta pagar : '. $this->acuenta);
        $impresora->feed();
        $impresora->text('Nombre: '.$name);
        $impresora->feed();
        $impresora->text($order->created_at);
        $impresora->feed();
        $impresora->text('----------------');


        $impresora->feed(2);
        foreach($content as $item){
        
        $impresora->text(  $item->qty.'   '.$item->name);
        $impresora->feed();
        $impresora->text( 'pz: $'.$item->price .'      $'.$item->subtotal );
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


        $this->cant="";
        $this->address ="";
        $this->name ="";


        
        

    


        

    }

 
    //render
    public function render(){
        $item = Cart::content();
        $this->user_id;//usuario
        $this->cant; //cantidad input
        $this->total = Cart::subtotal(2,'.',''); //this total
        $item = Cart::content();  //contenido

       
        //cantidad mostrara si el producto es pagado o no
        if($this->cant == null ) {
            $this->cant="";

        }else {
            
            if($this->cant < $this->total) {   //
                $this->cambio = 0 ;
                $this->falta = $this->total- $this->cant;
                $this->acuenta = $this->falta;
            } elseif($this->cant == $this->total) {
                $this->cambio = $this->cant - $this->total ;
                $this->falta = 0;
                $this->acuenta = 0;
            }elseif($this->cant > $this->total) {

                $this->cambio = $this->cant - $this->total;
                $this->falta = 0;
                $this->acuenta = 0;
            }
        }

        
        return view('livewire.admin.ventas', compact('item'))->layout('layouts.admin');
    }
}
