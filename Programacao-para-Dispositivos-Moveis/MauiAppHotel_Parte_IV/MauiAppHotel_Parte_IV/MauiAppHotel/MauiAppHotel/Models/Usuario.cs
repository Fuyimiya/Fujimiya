namespace MauiAppHotel.Models
{
    public class Usuario
    {
        string _nome = "";

        public string Nome { 
            get => _nome; 
            set
            {
                if (value == null)
                    throw new Exception("Informe seu nome.");
            }
        }
                
        public string Email { get; set; }
        public string Senha { get; set; }
    }
}
