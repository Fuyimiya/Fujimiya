using Microsoft.Maui.Controls.Shapes;
using System.Diagnostics;

namespace AppJogoDaVelha
{
    public partial class MainPage : ContentPage
    {
        string vez = "X";

        public MainPage()
        {
            InitializeComponent();
        }

        private async void Button_Clicked(object sender, EventArgs e)
        {
            Button clicado = (Button)sender;
            clicado.Text = vez;

            vez = (vez == "X") ? "O" : "X";

            if (btn10.Text == "X" && btn11.Text == "X" && btn12.Text == "X")
            {
                await DisplayAlertAsync("🏆", "X Ganhou!", "OK");
            }                    


            string[,] teste = new string[3,3];

            // Caminho mais longo...
            foreach (var x in jogo.Children)
            {
                if(x is Button btn)
                {
                    int coluna = Grid.GetColumn(btn);
                    int linha = Grid.GetRow(btn);
                    
                    teste[linha-1, coluna] = btn.Text;

                    //Debug.WriteLine(teste);

                    //Debug.WriteLine(btn.Text);
                    //Debug.WriteLine(coluna);
                    //Debug.WriteLine(linha);
                }                
            }

            // Visualizando os dados na matriz...
            for(int i = 0; i < teste.GetLength(0); i++)
            {
                for(int j = 0; j < teste.GetLength(1); j++)
                {
                    Debug.WriteLine("------------------------------");
                    Debug.WriteLine(teste[i,j]);
                }
            }

            

            





                // Falta fazer
                // - Verificar quem ganhou nas linhas, colunas e diagonais
                // - Zerar o Jogo
                // - Mostrar se deu empate

        } // Fecha método
    } // Fecha class
} // Fecha namespace
