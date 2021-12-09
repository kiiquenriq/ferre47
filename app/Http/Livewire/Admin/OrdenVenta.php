<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\Paid;
use App\Models\User;
use Livewire\Component;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use PHPUnit\Util\PHP\WindowsPhpProcess;
use Symfony\Component\Process\Pipes\WindowsPipes;

class OrdenVenta extends Component
{

    public $prueba="", $error,$si, $falta, $users, $user_id="";
    public $total, $cart=[];
    public $user, $cantidad, $idd, $cambio;
   
    public $date, $status, $order, $codigo, $paids, $barcode;


    protected $listeners = [
        'render',
        'scan-code' => 'paid',
        'update' => 'update'
    ];
    protected $rules = [
        'quantity' => 'required'
    ];

   
    public function paid($barcode) {
        $title="";
        $this->barcode = $barcode;
        $this->order = Order::query()->where('id','=', $barcode)->first(); //optional
        // $this->total = Order::where('user_id', $barcode )->where('status_paid', 8)->get();
        $this->status = $this->order->status_paid;
        $this->idd = $this->order->id;
        $this->total = $this->order->total; //total
        $this->user = $this->order->name;
        $this->date = $this->order->created_at;
        $this->falta = $this->order->Acuenta; //a cuenta
        
        // $this->;
        // dd($status);
       
      // id usuario
    
      $this->paids = Paid::where('order_id', $barcode)->get();
      
        // $this->orders = Order::query()->where('user_id', $idd)->get();
        
     
    
       
     
      
    }
     public function update(){
        $this->cantidad;
        $this->total;
        $this->falta;
        $hoy = date("d.m.y , g:i a");
        

    
        if($this->cantidad < $this->falta) {
            
            $final = $this->falta - $this->cantidad;
            $this->cambio = 0;
           
            $this->falta = $final;

            $paid = new Paid();
            $paid->order_id = $this->idd;
            $paid->Acuenta = $this->cantidad;
            $paid->save();
            

             Order::where('id', $this->idd)
                 ->update(['Acuenta' => $final]);

       

        
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
        $impresora->text('Orden: '. $this->idd);
         $impresora->feed();
         $impresora->setTextSize(1,2);
         $impresora->text('total: '. $this->total);
         $impresora->feed();
         $impresora->text($hoy);
       
        
        $impresora->feed(2);
        $impresora->text('----------------');
        $impresora->feed(2);


        $impresora->setTextSize(1,2);
        $impresora->text('Falta pagar : '. $final);
        $impresora->feed();

        $impresora->setTextSize(1,2);
        $impresora->text('Nombre: '.$this->order->name);


        $impresora->feed(2);
        $impresora->text('----------------');
        $impresora->feed(2);

        $impresora->setTextSize(1,2);
        $impresora->text('A cuenta: $'.$this->cantidad);


        $impresora->feed(6);
        
        $impresora->cut();
        $impresora->close();
     
           
        

       



            //  return redirect()->route('admin.orden-venta');

        } elseif ($this->cantidad == $this->falta) {

            $final = $this->falta - $this->cantidad;
            $this->cambio = $this->falta - $this->cantidad;
            $cue = $this->falta;
            $this->falta = 0;

           
             Order::where('id', $this->idd)
                  ->update(['Acuenta' => $final]);
            
          
              Order::where('id', $this->idd)
                  ->update(['status_paid' => '7']);
            
            // $this->order->status_paid = "7";
            // $this->order->save();
            
            //  return redirect()->route('admin.orden-venta');
            // $this->error = "cantidad correcta";



            
        
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
        $impresora->text('Orden: '. $this->idd);
        $impresora->setTextSize(1,2);
         $impresora->feed();
         $impresora->text('total: '. $this->total);
         $impresora->feed();
         $impresora->text($hoy);
       
        
        $impresora->feed(2);
        $impresora->text('----------------');
        $impresora->feed(2);


        $impresora->setTextSize(1,2);
        $impresora->text('Falta pagar : '. $final);
        $impresora->feed();

        $impresora->setTextSize(1,2);
        $impresora->text('Nombre: '.$this->order->name);


        $impresora->feed(2);
        $impresora->text('----------------');
        $impresora->feed(2);

        $impresora->setTextSize(1,2);
        $impresora->text('A cuenta: $'.$cue);


        $impresora->feed(6);
        
        $impresora->cut();
        $impresora->close();
     
           
    


        }elseif ($this->cantidad > $this->falta) {
            
            $final = 0;
            $this->cambio = $this->cantidad - $this->falta;
            $cue = $this->falta;

            $this->falta = 0;


            Order::where('id', $this->idd)
            ->update(['Acuenta' => $final]);
      
    
            Order::where('id', $this->idd)
            ->update(['status_paid' => '7']);

        
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
        $impresora->text('Orden: '. $this->idd);
         $impresora->feed();
         $impresora->setTextSize(1,2);
         $impresora->text('total: '. $this->total);
         $impresora->feed();
         $impresora->text($hoy);
       
        
        $impresora->feed(2);
        $impresora->text('----------------');
        $impresora->feed(2);


        $impresora->setTextSize(1,2);
        $impresora->text('Falta pagar : '. $final);
        $impresora->feed();

        $impresora->setTextSize(1,2);
        $impresora->text('Nombre: '.$this->order->name);


        $impresora->feed(2);
        $impresora->text('----------------');
        $impresora->feed(2);

        $impresora->setTextSize(1,2);
        $impresora->text('A cuenta: $'.$cue);


        $impresora->feed(6);
        
        $impresora->cut();
        $impresora->close();
     
           
      
           
            
            
        }


        $this->cantidad="";

        
    }

    public function cancel(){
        return redirect()->route('admin.welcome');
    }
    public function render()
   
    {
     
        $paids = Paid::where('order_id', $this->barcode)->get();
      
        
        return view('livewire.admin.orden-venta', compact('paids'))->layout('layouts.admin');
    }
}
