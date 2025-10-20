# Solução para Configuração de Email Gmail

## Problema Identificado
O erro mostra que as credenciais do Gmail não estão sendo aceitas:
```
535-5.7.8 Username and Password not accepted
```

## Soluções Necessárias

### 1. Configurar Senha de App no Gmail
O Gmail não aceita senhas normais para aplicações. É necessário criar uma "Senha de App":

1. **Acesse sua conta Google**: https://myaccount.google.com/
2. **Vá em Segurança** → **Verificação em duas etapas** (deve estar ativada)
3. **Procure por "Senhas de app"** ou "App passwords"
4. **Gere uma nova senha de app** para "Email"
5. **Use esta senha** no lugar de `HoogliDev2025` no arquivo `.env`

### 2. Verificar Configurações de Segurança
- **Verificação em duas etapas** deve estar ATIVADA
- **Acesso a apps menos seguros** deve estar DESATIVADO (não é mais suportado)

### 3. Configurações Corretas no .env
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=dev.hoogli@gmail.com
MAIL_PASSWORD=SUA_SENHA_DE_APP_AQUI
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=dev.hoogli@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Alternativa: Usar OAuth2 (Mais Seguro)
Para maior segurança, considere implementar OAuth2:

1. **Criar projeto no Google Cloud Console**
2. **Ativar Gmail API**
3. **Configurar OAuth2 credentials**
4. **Usar biblioteca OAuth2 para autenticação**

## Teste Após Configuração
Execute o script de teste:
```bash
php check_email_config.php
```

## Status Atual
- ✅ Configurações do .env estão corretas
- ✅ Email configurado no banco de dados
- ❌ Autenticação Gmail falhando (senha de app necessária)
- ✅ Sistema de envio de email funcionando (apenas credenciais)

## Próximos Passos
1. Configurar senha de app no Gmail
2. Atualizar .env com nova senha
3. Testar envio de email
4. Verificar recebimento no painel
