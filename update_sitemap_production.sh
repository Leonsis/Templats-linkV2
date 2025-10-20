#!/bin/bash

# Script para atualizar sitemap na hospedagem
echo "Atualizando sitemap para produção..."

# URL da hospedagem
PRODUCTION_URL="https://griffo.hoogli.cloud"

# Gerar sitemap via API
echo "Gerando sitemap via API..."
curl -s "${PRODUCTION_URL}/generate-sitemap/Griffo" > sitemap_response.json

# Verificar se a resposta contém sucesso
if grep -q '"success":true' sitemap_response.json; then
    echo "✅ Sitemap gerado com sucesso!"
    
    # Extrair o conteúdo do sitemap da resposta JSON
    echo "Extraindo conteúdo do sitemap..."
    cat sitemap_response.json | grep -o '"content":"[^"]*"' | sed 's/"content":"//' | sed 's/"$//' | sed 's/\\n/\n/g' | sed 's/\\\//\//g' > sitemap.xml
    
    echo "✅ Arquivo sitemap.xml atualizado!"
    echo "📁 Localização: $(pwd)/sitemap.xml"
    echo "🌐 Acesse: ${PRODUCTION_URL}/sitemap.xml"
    
    # Limpar arquivo temporário
    rm sitemap_response.json
    
else
    echo "❌ Erro ao gerar sitemap:"
    cat sitemap_response.json
    rm sitemap_response.json
    exit 1
fi
