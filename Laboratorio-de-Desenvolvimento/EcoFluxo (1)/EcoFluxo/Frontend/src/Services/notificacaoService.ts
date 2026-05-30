import api from "../utils/api"; // Ajuste o caminho até a sua pasta utils

// Busca todas as notificações do backend
export const obterNotificacoes = async () => {
  try {
    const resposta = await api.get("/notificacoes");
    return resposta.data;
  } catch (error) {
    console.error("Erro ao buscar notificações no service:", error);
    throw error;
  }
};

// Marca uma notificação específica como lida pelo ID
export const marcarNotificacaoComoLida = async (id: number) => {
  try {
    const resposta = await api.patch(`/notificacoes/${id}/ler`);
    return resposta.data;
  } catch (error) {
    console.error(`Erro ao marcar notificação ${id} como lida no service:`, error);
    throw error;
  }
};
// Adicione esta função no final do arquivo:
export const obterEstatisticasGrafico = async () => {
  try {
    const resposta = await api.get("/estatisticas");
    return resposta.data; // Retorna o array formatado do backend
  } catch (error) {
    console.error("Erro ao buscar estatísticas do gráfico:", error);
    throw error;
  }
};