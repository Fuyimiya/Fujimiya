import styles from "./Dashboard.module.css";
import { useEffect, useState } from "react";
import Chart from "react-apexcharts";
import api from "../utils/api";

export default function Dashboard(){
  const [lixeiras, setLixeiras] = useState<any[]>([]);

  const [historicoCritico, setHistoricoCritico] = useState<{ categorias: string[]; valores: number[] }>({
    categorias: [],
    valores: [],
  });

  const carregarDados = async()=>{
    try {
      // 1. Carrega os dados das lixeiras em tempo real (Donut)
      const response = await api.get("/ecopontosComLixeiras");
      const ecopontos = response.data;
      const todasAsLixeiras = ecopontos.flatMap((ponto: any) => ponto.lixeiras);
      setLixeiras(todasAsLixeiras);
     
   
      const resEstatisticas = await api.get("/estatisticas");
      setHistoricoCritico({
        categorias: resEstatisticas.data.map((item: any) => item.lixeira),
        valores: resEstatisticas.data.map((item: any) => item.total)
      });

    } catch (error) {
      console.error("Erro ao carregar os dados do Dashboard:", error);
    }
  };

  useEffect(()=>{
    carregarDados();
    const intervalo = setInterval(carregarDados, 10000);
    return ()=> clearInterval(intervalo);
  }, []);

  // Preparar os dados para geração do gráfico Donut
  const lixeirasVazias = lixeiras.filter(l=>l.nivel_cheio <= 40).length;
  const lixeirasMedias = lixeiras.filter(l=>l.nivel_cheio > 40 && l.nivel_cheio <=80).length;
  const lixeirasCriticas = lixeiras.filter(l=>l.nivel_cheio >80).length;
  
  const seriesDonut = [lixeirasVazias, lixeirasMedias, lixeirasCriticas];

  // Opções do gráfico Donut original (Apenas corrigido o typo 'Tooltip' e 'legends' da API do Apex)
  const optionsDonut: any = {
    chart: { id: "grafico-donut" },
    labels: ['Vazias/Baixas', 'Médias', 'Críticas'],
    colors: ['#10b981', '#f59e0b', '#ef4444'],
    legend: { // Correção de 'legends' para 'legend'
      position: 'bottom',
      fontFamily: 'Inter, sans-serif',
      fontWeight: 700,
    },
    chartEvents: { // Movido para a propriedade correta se necessário, mantido o seu gatilho
      dataPointSelection: () => {
        const secaoMapa = document.getElementById("secao-mapa");
        if (secaoMapa) secaoMapa.scrollIntoView({ behavior: "smooth" });
      }
    },
    plotOptions: {
      pie: {
        donut: {
          size: '70%',
          labels: {
            show: true,
            total: {
              show: true,
              label: 'TOTAL',
              fontSize: '14px',
              fontWeight: 'bold',
              color: '#064e3b',
              formatter: () => lixeiras.length
            }
          }
        }
      }
    },
    dataLabels: { enabled: false },
    states: {
      hover: { filter: { type: 'darken', value: 0.85 } },
      active: { allowMultipleDataPointsSelection: false, filter: { type: 'none' } }
    },
    tooltip: { // Correção de 'Tooltip' para 'tooltip'
      y: { formatter: (val: number) => `${val} lixeiras` }
    }
  };


  const optionsBarras: any = {
    chart: {
      id: "grafico-barras-criticas",
      toolbar: { show: false }
    },
    colors: ['#ef4444', '#f59e0b', '#3b82f6', '#10b981', '#8b5cf6'],
    plotOptions: {
      bar: {
        distributed: true,
        borderRadius: 6,
        columnWidth: '50%'
      }
    },
    dataLabels: { enabled: true },
    xaxis: {
      categories: historicoCritico.categorias,
      labels: { style: { fontFamily: 'Inter, sans-serif', fontWeight: 600 } }
    },
    legend: { show: false },
    tooltip: {
      y: { formatter: (val: number) => `${val} alertas no mês` }
    }
  };

  const seriesBarras = [{
    name: "Alertas Gerados",
    data: historicoCritico.valores
  }];

  const mediaOcupacao = lixeiras.length > 0 ? (lixeiras.reduce((acc, curr) => acc + curr.nivel_cheio, 0) / lixeiras.length).toFixed(0) : 0;

  return (
    <div className={styles.container}>
      <div className={styles.header}>
        <h1 className={styles.tituloPrincipal}>Painel de Gestão</h1>
        <p className={styles.subtitulo}>Monitoramento analítico de resíduos</p>
      </div>

      <div className={styles.gridCards}>
        <div className={`${styles.cardBase} ${styles.cardTotal}`}>
          <span className={styles.labelCard}>Total de Lixeiras</span>
          <h2 className={`${styles.valorCard} text-emerald-900`}>{lixeiras.length}</h2>
        </div>

        <div className={`${styles.cardBase} ${styles.cardCritico}`}>
          <span className={styles.labelCard}>Alertas Críticos</span>
          <h2 className={`${styles.valorCard} text-red-600`}>{lixeirasCriticas}</h2>
        </div>

        <div className={`${styles.cardBase} ${styles.cardMedia}`}>
          <span className={styles.labelCard}>Média de Ocupação</span>
          <h2 className={`${styles.valorCard} text-amber-600`}>{mediaOcupacao}%</h2>
        </div>
      </div>

      {/* Bloco de Gráficos Lado a Lado (ou empilhados no Mobile) */}
      <div className="w-full grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        
        {/* Gráfico 1: O seu Donut de Ocupação Real */}
        <div className={styles.containerGrafico}>
          <h3 className={styles.tituloGrafico}>Distribuição de Carga (Tempo Real)</h3>
          <div className="w-full flex justify-center cursor-pointer" onClick={optionsDonut.chartEvents.dataPointSelection}>
            <Chart options={optionsDonut} series={seriesDonut} type="donut" width={400} />
          </div>
          <p className="text-xs text-gray-400 mt-4 italic">
            * Clique no gráfico para localizar no mapa
          </p>
        </div>

        {/* 🔥 Gráfico 2: O Novo Histórico de Alertas do Mês */}
        <div className={styles.containerGrafico}>
          <h3 className={styles.tituloGrafico}>Lixeiras Mais Críticas (Últimos 30 dias)</h3>
          <div className="w-full flex justify-center">
            {historicoCritico.valores.length > 0 ? (
              <Chart options={optionsBarras} series={seriesBarras} type="bar" width="100%" height={280} />
            ) : (
              <p className="text-sm text-gray-400 p-12">Nenhum alerta gerado neste mês.</p>
            )}
          </div>
          <p className="text-xs text-gray-400 mt-4 italic">
            * Baseado em dados compilados do histórico de notificações
          </p>
        </div>

      </div>
    </div>
  );
}