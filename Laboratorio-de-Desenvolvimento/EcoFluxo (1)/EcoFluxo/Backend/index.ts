import "dotenv/config";
import express from "express";
import cors from "cors";
import cookieParser from "cookie-parser";
//importar as rotas
import routerUsuario from "./src/Routes/UsuarioRoute.js";
import routerEcoponto from "./src/Routes/EcopontoRoutes.js";
import routerNotificacao from "./src/Routes/NotificacaoRoutes.js";
import { iniciarVigiaDeLixeiras } from "./src/Services/verificadorNotificacoes.js";
const app = express();
const PORT = process.env.PORT|| 5000;
app.use(cors({
    origin: "http://localhost:5173",
    credentials: true,
}));
app.use(express.json());
app.use(cookieParser());
//fazer use das rotas
app.use("/api", routerUsuario);
app.use("/api", routerEcoponto);
app.use("/api", routerNotificacao);
iniciarVigiaDeLixeiras();
app.listen(PORT, ()=>{
    console.log(`Servidor rodando na porta ${PORT}`);
})
