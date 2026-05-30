import { Router } from "express";
import { 
    listarNotificacoes,
    marcarComoLida,
    obterEstatisticasCriticas 
    
    
} from "../Controllers/NotificacaoController.js";
import {
    autenticacaoToken,
    autorizacaoPerfil
} from "../middleware/seguranca.js";
const router = Router();


router.get("/notificacoes", autenticacaoToken, autorizacaoPerfil("GESTOR"), listarNotificacoes);
router.patch("/notificacoes/:id/ler", autenticacaoToken, autorizacaoPerfil("GESTOR"), marcarComoLida);
router.get("/estatisticas", autenticacaoToken, autorizacaoPerfil("GESTOR"), obterEstatisticasCriticas);

export default router;