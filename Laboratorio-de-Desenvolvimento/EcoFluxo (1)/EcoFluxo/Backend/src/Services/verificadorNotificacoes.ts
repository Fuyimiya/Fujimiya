import cron from "node-cron";
import prisma from "../lib/prisma.js";// Ajuste o caminho se o seu arquivo prisma estiver em outro lugar
import { sendLixeiraAlertaEmail } from "./EmailService.js"; // Ajuste o caminho para o seu arquivo de serviço de e-mail

export const iniciarVigiaDeLixeiras = () => {
 
  cron.schedule("*/1 * * * *", async () => {
    console.log("Vigia: Verificando nível das lixeiras no banco...");

    try {
     
      const lixeirasCriticas = await prisma.lixeira.findMany({
        where: {
          nivel_cheio: {
            gt: 80, 
          },
        },
        include: {
          ecoponto: true, 
        },
      });

      
      for (const lixeira of lixeirasCriticas) {
        

        const mensagemAlerta = `A lixeira de ${lixeira.tipo} no Ecoponto ${lixeira.ecoponto.nome} atingiu ${lixeira.nivel_cheio}%.`;


        const alertaExistente = await prisma.notificacao.findFirst({
          where: {
            mensagem: mensagemAlerta,
            lida: false, // Se o gestor ainda não leu o alerta anterior, não cria outro
          },
        });

        // Se o alerta já existir no sininho do gestor, pula para a próxima lixeira crítica
        if (alertaExistente) {
          continue;
        }

        // 4. Se for um alerta inédito, cria o registro na tabela de notificações do banco
        await prisma.notificacao.create({
            data: {
                lixeira_id: lixeira.id,        
                titulo: "Nível Crítico Detectado",
                mensagem: mensagemAlerta,
                lida: false,                   
            },
        });

       
        await sendLixeiraAlertaEmail(
          lixeira.ecoponto.nome,
          lixeira.tipo,
          lixeira.nivel_cheio
        );

        console.log(`[SUCESSO] Notificação e E-mail disparados para: Ecoponto ${lixeira.ecoponto.nome} (${lixeira.tipo})`);
      }

    } catch (error) {
      console.error("Erro na varredura do vigia de lixeiras:", error);
    }
  });
};