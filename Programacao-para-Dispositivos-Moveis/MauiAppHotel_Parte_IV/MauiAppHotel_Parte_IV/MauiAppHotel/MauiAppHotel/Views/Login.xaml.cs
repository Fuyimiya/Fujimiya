using MauiAppHotel.Models;

namespace MauiAppHotel.Views;

public partial class Login : ContentPage
{
	public Login()
	{
		InitializeComponent();
	}

    private async void Button_Clicked_Entrar(object sender, EventArgs e)
    {
        try
        {
            // Dados digitados pelo usuário
            Usuario u = new Usuario();
            u.Email = txt_email.Text;
            u.Senha = txt_senha.Text;

            // LINQ
            bool retorno = App.lista_usuarios.Any(i => (i.Senha == u.Senha && i.Email == u.Email));

            if (retorno)
            {
                await DisplayAlertAsync("Ops", "Logado com sucesso", "OK");
                await SecureStorage.Default.SetAsync("nome_usuario", u.Email);
            } else
            {
                throw new Exception("E-mail ou senha  incorretos.");
            }
        } catch(ArgumentNullException ex)
        {
            await DisplayAlertAsync("Ops", "Você não preencheu o display alert direito", "OK");
        }
        catch (Exception ex)
        {
            await DisplayAlertAsync("Ops", ex.Message, "OK");
        }

        //await DisplayAlertAsync("OK", "Você vai entrar", "OK");
    }

    private async void Button_Clicked_Cadastrar(object sender, EventArgs e)
    {
        await Navigation.PushAsync(new Views.Cadastro());
    }
}