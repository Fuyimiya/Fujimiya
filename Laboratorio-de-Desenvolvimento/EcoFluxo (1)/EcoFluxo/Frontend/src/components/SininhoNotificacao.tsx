import { useState, useEffect } from 'react';
import { obterNotificacoes, marcarNotificacaoComoLida } from '../Services/notificacaoService';

export default function SininhoNotificacao() {
  const [notificacoes, setNotificacoes] = useState<any[]>([]);
  const [isOpen, setIsOpen] = useState(false);

  // Função interna para carregar as notificações da API
  const carregarNotificacoes = async () => {
    try {
      const dados = await obterNotificacoes();
      setNotificacoes(dados);
    } catch (error) {
      console.error("Erro ao carregar notificações no componente:", error);
    }
  };

  // Executa ao montar o componente e cria o intervalo de atualização (polling)
  useEffect(() => {
    carregarNotificacoes(); // Busca imediata ao carregar a página

    const intervalo = setInterval(() => {
      carregarNotificacoes();
    }, 10000); // Executa a busca a cada 10 segundos

    return () => clearInterval(intervalo); // Limpa o intervalo ao desmontar a tela
  }, []);

  // Cuida do clique para marcar como lida e atualiza o estado local imediatamente
  const handleMarcarComoLida = async (id: number) => {
    try {
      await marcarNotificacaoComoLida(id);
      // Remove da lista do front sem precisar recarregar a página inteira
      setNotificacoes((prev) => prev.filter((notif) => notif.id !== id));
    } catch (error) {
      alert("Não foi possível marcar a notificação como lida.");
    }
  };

  return (
    <div className="relative inline-block text-left">
      {/* Botão do Sininho */}
      <button 
        onClick={() => setIsOpen(!isOpen)} 
        className="relative p-2 text-emerald-800 hover:text-emerald-500 transition focus:outline-none"
      >
        <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        
        {/* Contador Vermelho com efeito pulsar */}
        {notificacoes.length > 0 && (
          <span className="absolute top-1 right-1 bg-red-500 text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center animate-pulse">
            {notificacoes.length}
          </span>
        )}
      </button>

      {/* Menu Dropdown de Notificações */}
      {isOpen && (
        <>
          {/* Fundo transparente para fechar o menu ao clicar fora */}
          <div className="fixed inset-0 z-40" onClick={() => setIsOpen(false)}></div>
          
          <div className="absolute right-0 mt-2 w-80 bg-white border border-emerald-100 rounded-lg shadow-xl z-50 max-h-96 overflow-y-auto">
            <div className="p-3 border-b border-emerald-50 font-bold text-emerald-800 text-sm flex justify-between items-center bg-emerald-50/20">
              <span>Alertas do Sistema</span>
              <span className="text-xs font-normal text-emerald-600">{notificacoes.length} pendentes</span>
            </div>
            
            <div className="divide-y divide-gray-100">
              {notificacoes.length === 0 ? (
                <p className="p-4 text-sm text-gray-500 text-center">Nenhum alerta pendente</p>
              ) : (
                notificacoes.map((notif) => (
                  <div key={notif.id} className="p-3 hover:bg-emerald-50/30 flex justify-between items-start gap-2 transition">
                    <div className="flex-1">
                      <h4 className="text-xs font-bold text-red-600 flex items-center gap-1">
                        {notif.titulo}
                      </h4>
                      <p className="text-xs text-gray-600 mt-1 leading-relaxed">{notif.mensagem}</p>
                      <span className="text-[10px] text-gray-400 block mt-1">
                        {new Date(notif.criadoEm).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}
                      </span>
                    </div>
                    
                    {/* Botão de Concluir / Marcar como Lida */}
                    <button 
                      onClick={() => handleMarcarComoLida(notif.id)}
                      className="p-1 text-emerald-600 hover:bg-emerald-100 rounded transition text-sm font-bold flex-shrink-0"
                      title="Marcar como lida"
                    >
                      ✓
                    </button>
                  </div>
                ))
              )}
            </div>
          </div>
        </>
      )}
    </div>
  );
}