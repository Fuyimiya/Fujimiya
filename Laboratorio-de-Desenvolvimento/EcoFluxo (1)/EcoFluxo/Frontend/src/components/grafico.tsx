import { useEffect, useState } from "react";
import Chart from "react-apexcharts";
import { obterEstatisticasGrafico } from "../Services/notificacaoService";

export default function GraficoLixeirasCriticas() {
  const [dadosGrafico, setDadosGrafico] = useState<{ categorias: string[]; valores: number[] }>({
    categorias: [],
    valores: [],
  });
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const carregarDados = async () => {
      try {
        const dados = await obterEstatisticasGrafico();
        
        // Separa os dados em dois arrays exigidos pelo ApexCharts (X e Y)
        const categorias = dados.map((item: any) => item.lixeira);
        const valores = dados.map((item: any) => item.total);

        setDadosGrafico({ categorias, valores });
      } catch (error) {
        console.error("Erro ao renderizar gráfico:", error);
      } finally {
        setLoading(false);
      }
    };

    carregarDados();
  }, []);

  // Configurações visuais do ApexCharts (Cores estilo EcoFluxo)
  const options = {
    chart: {
      id: "lixeiras-criticas",
      toolbar: { show: false }, // Remove botões de download inúteis para o cliente
    },
    colors: ["#10b981", "#ef4444", "#f59e0b", "#3b82f6", "#8b5cf6"], // Paleta de cores moderna (Emerald, Red, Amber...)
    plotOptions: {
      bar: {
        distributed: true, // Dá uma cor diferente para cada barra
        borderRadius: 6,
        horizontal: false, // Barra vertical (mude para true se quiser gráfico horizontal)
        columnWidth: "55%",
      },
    },
    dataLabels: {
      enabled: true, // Mostra o número exato em cima da barra
    },
    xaxis: {
      categories: dadosGrafico.categorias,
      labels: {
        style: { fontSize: "12px", fontWeight: 600 }
      }
    },
    legend: { show: false }, // Esconde legenda já que o eixo X já identifica
    title: {
      text: "Alertas Críticos por Tipo de Lixeira (Últimos 30 dias)",
      align: "left" as const,
      style: { fontSize: "16px", color: "#065f46", fontWeight: "bold" },
    },
  };

  const series = [
    {
      name: "Quantidade de Alertas",
      data: dadosGrafico.valores,
    },
  ];

  if (loading) {
    return <p className="text-center p-6 text-sm text-gray-500">Carregando dados do gráfico...</p>;
  }

  return (
    <div className="bg-white p-6 rounded-xl border border-emerald-100 shadow-sm">
      <Chart options={options} series={series} type="bar" height={320} />
    </div>
  );
}