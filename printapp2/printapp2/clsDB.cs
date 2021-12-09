using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace printapp2
{
    public class clsDB
    {

        //parametros de conexion a mysql
        private static string server = "localhost";
        private static string user = "root";
        private static string password = "pass";
        private static string database = "project";


        public static DataTable getData(string qry)
        {
            try
            {
                //cadena de conexion a mysql
                string strConn = $"server ={server}; uid={user}; database={database}; pwd={password}";
                MySqlConnection MyConn = new MySqlConnection(strConn);
                MySqlCommand MyCommand = new MySqlCommand(qry, MyConn);
                MySqlDataAdapter MyAdapter = new MySqlDataAdapter();
                MyAdapter.SelectCommand = MyCommand;

                //generar tabla

                DataTable info = new DataTable();
                MyAdapter.Fill(info);
                return info;


            }
            catch (Exception)
            {

                throw;
            }
        }
    }
}
