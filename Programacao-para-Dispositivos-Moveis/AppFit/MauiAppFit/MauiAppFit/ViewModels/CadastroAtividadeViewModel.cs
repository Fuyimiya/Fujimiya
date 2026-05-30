using MauiAppFit.Models;
using System.ComponentModel;
using System.Windows.Input;

namespace MauiAppFit.ViewModels
{
    public class CadastroAtividadeViewModel : INotifyPropertyChanged
    {
        public event PropertyChangedEventHandler? PropertyChanged;

        string? descricao;
        string? observacoes;
        int? id;
        DateTime data = DateTime.Now;
        double? peso;

        public string? Descricao
        {
            get => descricao;
            set
            {
                descricao = value;
                PropertyChanged(this, new PropertyChangedEventArgs("Descricao"));
            }
        }

        public string? Observacoes
        {
            get => observacoes;
            set
            {
                observacoes = value;
                PropertyChanged(this, new PropertyChangedEventArgs("Observacoes"));
            }
        }

        public int? Id
        {
            get => id;
            set
            {
                id = value;
                PropertyChanged(this, new PropertyChangedEventArgs("Id"));
            }
        }

        public DateTime Data
        {
            get => data;
            set
            {
                data = value;
                PropertyChanged(this, new PropertyChangedEventArgs(nameof(Data)));
            }
        }

        public double? Peso
        {
            get => peso;
            set
            {
                peso = value;
                PropertyChanged(this, new PropertyChangedEventArgs("Peso"));
            }
        }

        public ICommand SalvarAtividade
        {
            get => new Command(async () =>
            {
                try
                {
                    Atividade model = new()
                    {
                        Descricao = this.Descricao,
                        Data = this.Data,
                        Peso = this.Peso,
                        Observacoes = this.Observacoes
                    };

                    if(this.Id == 0)
                    {
                        await App.Database.Insert(model);
                    } else
                    {
                        model.Id = this.Id;
                        await App.Database.Update(model);
                    }

                    await Shell.Current.DisplayAlertAsync("Beleza","Dados salvos com sucesso!", "OK");
                    await Shell.Current.GoToAsync("//MinhasAtividades");
                }
                catch (Exception ex)
                {
                    await Shell.Current.DisplayAlertAsync("Ops", ex.Message, "OK");
                }
            });
        }
    }
}
