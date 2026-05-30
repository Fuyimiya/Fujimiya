import { Router } from 'express';
import { 
    buscarEcopontosComLixeiras,
    //RegistrarEcoPonto,
    //RegistrarLixeiras
    
} from "../Controllers/EcopontoController.js";
import {
    autenticacaoToken,
    autorizacaoPerfil
} from "../middleware/seguranca.js";

const routerEcoponto = Router();

routerEcoponto.get('/ecopontosComLixeiras', buscarEcopontosComLixeiras); 
//routerEcoponto.get('/registrarEcoponto',autenticacaoToken, autorizacaoPerfil("GESTOR") , RegistrarEcoPonto); 

export default routerEcoponto;