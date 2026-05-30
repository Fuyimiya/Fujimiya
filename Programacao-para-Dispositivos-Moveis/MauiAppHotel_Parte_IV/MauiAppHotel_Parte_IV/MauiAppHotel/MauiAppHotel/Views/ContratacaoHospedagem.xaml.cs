using MauiAppHotel.Models;

namespace MauiAppHotel.Views;

public partial class ContratacaoHospedagem : ContentPage
{
    List<Quarto> lista_quartos = new()
    {
        new Quarto()
        {
            Descricao = "Suíte Super Luxo",
            ValorDiariaAdulto = 110.0,
            ValorDiariaCrianca = 55
        },
        new Quarto()
        {
            Descricao = "Suíte Luxo",
            ValorDiariaAdulto = 80.0,
            ValorDiariaCrianca = 40
        },
        new Quarto()
        {
            Descricao = "Suíte Single",
            ValorDiariaAdulto = 50.0,
            ValorDiariaCrianca = 25.0
        },
        new Quarto()
        {
            Descricao = "Suíte Crise",
            ValorDiariaAdulto = 25,
            ValorDiariaCrianca = 12.5
        },
    };

	public ContratacaoHospedagem()
	{
		InitializeComponent();
        
        // Abastecendo o picker com a lista de quartos.
        pck_quarto.ItemsSource = lista_quartos;

        // Validando a data mínima de máxima de checkin
        dtpck_checkin.MinimumDate = DateTime.Now;
        //dtpck_checkin.MaximumDate = new DateTime(DateTime.Now.Year, DateTime.Now.Month + 1, DateTime.Now.Day);
        dtpck_checkin.MaximumDate = DateTime.Now.AddMonths(2);


        dtpck_checkout.MinimumDate = dtpck_checkin.Date.Value.AddDays(1);
        dtpck_checkout.MaximumDate = dtpck_checkin.Date.Value.AddMonths(2);        
    }

    protected override async void OnAppearing()
    {
        string? nome_usuario = await SecureStorage.Default.GetAsync("nome_usuario");

        if(nome_usuario != null)
        {
            txt_usuario_logado.Text = nome_usuario;
            txt_usuario_logado.IsVisible = true;            
            btn_sair.IsVisible = true;
        }
        
    }

    private void dtpck_checkin_DateSelected(object sender, DateChangedEventArgs e)
    {
        DatePicker elemento = (DatePicker)sender;

        DateTime data_selecionada = elemento.Date.Value;

        dtpck_checkout.MinimumDate = data_selecionada.AddDays(1);
        dtpck_checkout.MaximumDate = data_selecionada.AddMonths(2);
    }


    private async void Button_Clicked(object sender, EventArgs e)
    {
        try
        {
            // Montagem do objeto com os dados da hospedagem.
            Hospedagem h = new()
            {
                QuartoSelecionado = (Quarto)pck_quarto.SelectedItem,
                DataCheckIn = (DateTime)dtpck_checkin.Date,
                DataCheckOut = (DateTime)dtpck_checkout.Date,
                QntAdultos = Convert.ToInt32(stp_adultos.Value),
                QntCriancas = (int) stp_criancas.Value,
            };

            // Criação da nova tela, onde serão mostrados os dados de hospedagem
            HospedagemContratada hc = new();

            // Juntando o esqueleto da tela com os dados da hospedagem.
            hc.BindingContext = h;

            // Navegando de tela, indo para a tela crianda anteriormente (linha 78)
            await Navigation.PushAsync(hc);


            // Tudo acima, mas escrito de forma compacta.
            await Navigation.PushAsync(new HospedagemContratada()
            {
                BindingContext =  new Hospedagem()
                {
                    QuartoSelecionado = (Quarto)pck_quarto.SelectedItem,
                    DataCheckIn = (DateTime)dtpck_checkin.Date,
                    DataCheckOut = (DateTime)dtpck_checkout.Date,
                    QntAdultos = Convert.ToInt32(stp_adultos.Value),
                    QntCriancas = (int)stp_criancas.Value,
                }
            });
        }
        catch (Exception ex)
        {
            await DisplayAlertAsync("Ops", ex.Message, "OK");
        }
    }

    private async void btn_sair_Clicked(object sender, EventArgs e)
    {
        bool confirmacao = await DisplayAlertAsync(
            "Tem certeza?", "Encerrar sessão?", "OK", "Cancelar");

        if(confirmacao)
        {
            SecureStorage.Default.Remove("nome_usuario");

            txt_usuario_logado.IsVisible = false;
            btn_sair.IsVisible = false;
        }
            
    }
}