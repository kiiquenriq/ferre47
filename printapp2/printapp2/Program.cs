using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace printapp2
{
    public class Program
    {
        //punto de entrada
        static void Main(string[] args)
        {

            //void no retorna nada
            if(args == null || args.Length == 0) //validar que exista parametro order_id
            {
                System.Environment.Exit(0); //cerrar aplicacion
            } else
            {
                string printerName = ""; //nombre de impresora
                readPrinter(ref printerName);

                //print://{order_id}/
                string orderId = args[0].Replace("print://", string.Empty).Replace("/", string.Empty); //orderId

                clsDocs.Receipt(orderId, printerName);

            }

        }

        private static void readPrinter(ref string printerName)
        {
            //definir la ruta
            string rootFolder = Path.GetDirectoryName(System.Reflection.Assembly.GetExecutingAssembly().Location);

            string textFile = rootFolder + @"\printer.txt";
            //validar si el archivo existe

            if (File.Exists(textFile))
            {
                printerName = File.ReadAllText(textFile);

            }else
            {
                printerName = "Epson";
            }

        }

        


    }
}
