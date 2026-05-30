import { Request, Response } from "express";
import prisma from "../lib/prisma.js";

export const listarNotificacoes = async (req: Request, res: Response) => {
  try {
    const notificacoes = await prisma.notificacao.findMany({
      where: {
        lida: false, 
      },
      orderBy: {
        criadoEm: "desc", 
      },
    });

    return res.status(200).json(notificacoes);
  } catch (error) {
    console.error("Erro ao listar notificações:", error);
    return res.status(500).json({ error: "Erro interno ao buscar notificações." });
  }
};


export const marcarComoLida = async (req: Request, res: Response) => {
  const { id } = req.params;

  try {
    const notificacaoAtualizada = await prisma.notificacao.update({
      where: {
        id: Number(id),
      },
      data: {
        lida: true,
      },
    });

    return res.status(200).json(notificacaoAtualizada);
  } catch (error) {
    console.error("Erro ao atualizar notificação:", error);
    return res.status(500).json({ error: "Erro interno ao atualizar notificação." });
  }
};
export const obterEstatisticasCriticas = async (req: Request, res: Response) => {
    //tipo do item
    interface ItemAgrupado {
    lixeira_id: number;
    _count: {
      id: number;
    };
  }
  //tipo l
  interface LixeiraRelacionada {
    id: number;
    tipo: string;
    ecoponto: {
      nome: string;
    } | null;
  }

  try {
    const dadosAgrupados = await prisma.notificacao.groupBy({
      by: ['lixeira_id'],
      _count: {
        id: true,
      }
    });

    if (!dadosAgrupados || dadosAgrupados.length === 0) {
      return res.json([]);
    }

    const idsDasLixeiras = dadosAgrupados.map((item: ItemAgrupado) => item.lixeira_id);
    
    const lixeirasDoBanco = await prisma.lixeira.findMany({
      where: {
        id: { in: idsDasLixeiras }
      },
      select: {
        id: true,
        tipo: true,
        ecoponto: {
          select: {
            nome: true
          }
        }
      }
    });


    const resultadoFormatado = dadosAgrupados.map((item: ItemAgrupado) => {
      const dadosLixeira = (lixeirasDoBanco as LixeiraRelacionada[]).find(
        (l: LixeiraRelacionada) => l.id === item.lixeira_id
      );

      if (dadosLixeira) {
        const tipoLixeira = dadosLixeira.tipo;
        const nomeEcoponto = dadosLixeira.ecoponto?.nome || "Ecoponto não encontrado";
        
        return {
          lixeira: `Ecoponto ${nomeEcoponto} - ${tipoLixeira}`,
          total: item._count.id
        };
      }

      return {
        lixeira: `Lixeira Removida (#${item.lixeira_id})`,
        total: item._count.id
      };
    });

    return res.status(200).json(resultadoFormatado);

  } catch (error) {
    console.error("Erro ao gerar estatísticas:", error); // Bom para ver no terminal se algo der errado
    return res.status(500).json({ message: "Problema com os dados do gráfico" });
  }
};