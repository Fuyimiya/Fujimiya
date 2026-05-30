namespace MauiAppMinhasCompras.Views;

public partial class ListaProdutos : ContentPage
{
	public ListaProdutos()
	{
		InitializeComponent();

        lst_produtos.ItemsSource = new List<Models.Produto>()
        {
            new Models.Produto() { Id=1, Descricao="Maçã", Preco=3.99, Quantidade=2 },
            new Models.Produto() { Id=2, Descricao="Pera", Preco=1.99, Quantidade=5 },
            new Models.Produto() { Id=3, Descricao="Uva", Preco=5.78, Quantidade=6 },
            new Models.Produto() { Id=4, Descricao="Mamão", Preco=2.18, Quantidade=1 },
            new Models.Produto() { Id=5, Descricao="Melão", Preco=3.75, Quantidade=12 }
        };
	}

    private void ToolbarItem_Clicked_Somar(object sender, EventArgs e)
    {

    }

    private void ToolbarItem_Clicked_Adicionar(object sender, EventArgs e)
    {

    }

    private void txt_search_TextChanged(object sender, TextChangedEventArgs e)
    {

    }

    private void lst_produtos_Refreshing(object sender, EventArgs e)
    {

    }

    private void lst_produtos_ItemSelected(object sender, SelectedItemChangedEventArgs e)
    {

    }

    private void MenuItem_Clicked_Remover(object sender, EventArgs e)
    {

    }
}