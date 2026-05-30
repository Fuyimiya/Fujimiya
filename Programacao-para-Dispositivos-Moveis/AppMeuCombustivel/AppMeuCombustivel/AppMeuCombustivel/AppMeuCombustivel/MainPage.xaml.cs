namespace AppMeuCombustivel
{
    public partial class MainPage : ContentPage
    {
        public MainPage()
        {
            InitializeComponent();
        }

        private async void Button_Clicked(object sender, EventArgs e)
        {
            double preco_gasolina = Convert.ToDouble(gasolina.Text);
            double preco_etanol = Convert.ToDouble(etanol.Text);
            string msg = "";

            if( preco_etanol > (preco_gasolina *0.7))
            {
                msg = "Compensa a gasolina";
            } else
            {
                msg = "Compensa o etanol";
            }
            await DisplayAlertAsync("Resultado:", msg, "OK");
        }
    }
}
