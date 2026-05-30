import {Request, Response, NextFunction} from "express";
import jwt from "jsonwebtoken";
const JWT_SECRET = process.env.JWT_SECRET as string;

//interface que contenha os dados do token

export interface UsuarioPayload{
    id:number;
    nome:string;
    email:string;
    perfil:"MORADOR" | "GESTOR";
}

export interface AuthRequest extends Request{
    user?:UsuarioPayload;
}

export const autenticacaoToken = (req:AuthRequest, res:Response, next:NextFunction)=>{
    const token = req.cookies.jwt;
    if(!token){
        return res.status(402).json({message:"Acesso Negado"});
    }
    //verificação do token
    try {
            const decoded = jwt.verify(token, JWT_SECRET) as
                            UsuarioPayload;
                            req.user = decoded;
                            next();

    } catch (error) {
        res.clearCookie('jwt');
        return res.status(403).json({message:"Acesso Negado"})
    }
}

export const autorizacaoPerfil = (perfilPermitido:"MORADOR" | "GESTOR")=>{
    return (req:AuthRequest, res:Response, next:NextFunction)=>{
        if(!req.user){
            return res.status(402).json({message:"Acesso Negado"});
        }
        if(req.user.perfil !== perfilPermitido){
            return res.status(402).json({message:"Acesso Negado"});
        }
        next();
    };
    
};

