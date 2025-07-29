# ProFatto WordPress Theme

Um tema WordPress moderno e responsivo desenvolvido para a ProFatto - Revestimentos e Louças de Alto Padrão.

## Características

### ✅ Funcionalidades Implementadas

- **Design Responsivo**: Adaptável a todos os dispositivos
- **SEO Otimizado**: Estrutura semântica e meta tags adequadas
- **Performance**: Código otimizado e carregamento eficiente
- **Acessibilidade**: Conformidade com WCAG 2.1
- **Customizável**: Painel de personalização integrado
- **Multilíngue**: Suporte a traduções
- **WooCommerce**: Compatível com WooCommerce (se ativo)

### 🎨 Design e UX

- **Paleta de Cores**: Verde profissional (#1a5f3c, #4caf50, #8bc34a)
- **Tipografia**: Inter (Google Fonts)
- **Ícones**: Font Awesome 6
- **Animações**: Transições suaves e micro-interações
- **Layout**: Grid CSS moderno

### 📱 Responsividade

- **Desktop**: Layout completo com navegação horizontal
- **Tablet**: Adaptação para telas médias
- **Mobile**: Menu hambúrguer e layout otimizado

## Estrutura de Arquivos

```
profatto/
├── functions.php          # Funções principais do tema
├── header.php            # Cabeçalho do site
├── footer.php            # Rodapé do site
├── index.php             # Página inicial
├── page.php              # Template para páginas
├── single.php            # Template para posts
├── archive.php           # Template para arquivos
├── 404.php              # Página de erro 404
├── searchform.php        # Formulário de busca
├── style.css             # Estilos principais
├── js/
│   └── main.js          # JavaScript do tema
└── README.md            # Este arquivo
```

## Actions e Filters Utilizados

### Actions
- `after_setup_theme`: Configurações do tema
- `init`: Registro de menus e post types
- `widgets_init`: Registro de sidebars
- `wp_enqueue_scripts`: Carregamento de scripts e estilos
- `customize_register`: Personalização do Customizer
- `add_meta_boxes`: Meta boxes personalizadas
- `save_post`: Salvamento de dados personalizados
- `wp_head`: Estilos adicionais
- `wp_ajax_*`: Handlers AJAX

### Filters
- `body_class`: Classes do body
- `excerpt_length`: Comprimento do excerpt
- `excerpt_more`: Texto "leia mais"

## Custom Post Types

### Projetos
- **Slug**: `projetos`
- **Campos**: Cliente, Local, Área
- **Suporte**: Título, Editor, Imagem destacada, Excerpt

### Produtos
- **Slug**: `produtos`
- **Suporte**: Título, Editor, Imagem destacada, Excerpt

## Personalização

### Customizer
- **Telefone**: Número de contato
- **Endereços**: Lojas 1 e 2
- **Horário**: Horário de funcionamento

### Menus
- **Menu Principal**: Navegação principal
- **Menu Rodapé**: Links do rodapé

### Widgets
- **Sidebar Principal**: Widgets laterais
- **Footer Widgets**: 3 áreas de widgets no rodapé

## Funcionalidades JavaScript

### Interatividade
- Menu mobile responsivo
- Slider automático no hero
- Newsletter com AJAX
- Animações no scroll
- Contadores animados
- Botão "voltar ao topo"
- Validação de formulários

### Performance
- Lazy loading de imagens
- Debounce em eventos de scroll
- Otimização de animações

## CSS Features

### Variáveis CSS
```css
:root {
    --primary-color: #1a5f3c;
    --secondary-color: #4caf50;
    --accent-color: #8bc34a;
    --text-dark: #333;
    --text-light: #666;
    --text-white: #fff;
    --bg-light: #f8f9fa;
    --bg-dark: #1a1a1a;
    --border-color: #e0e0e0;
    --shadow: 0 2px 10px rgba(0,0,0,0.1);
    --transition: all 0.3s ease;
}
```

### Layout
- **Grid CSS**: Layout moderno e flexível
- **Flexbox**: Alinhamentos precisos
- **CSS Variables**: Fácil personalização
- **Media Queries**: Responsividade completa

## Seções da Página Inicial

1. **Hero Section**: Banner principal com slider
2. **Sobre Nós**: Informações da empresa com estatísticas
3. **Como Ajudamos**: 3 passos de assistência
4. **Newsletter**: Formulário de inscrição
5. **Projetos Recentes**: Grid de projetos

## Rodapé

- **Logo e Redes Sociais**: Identidade da marca
- **Mapa do Site**: Links de navegação
- **Informações das Lojas**: Endereços e contatos

## Instalação

1. Faça upload do tema para `/wp-content/themes/`
2. Ative o tema no painel WordPress
3. Configure os menus em **Aparência > Menus**
4. Personalize no **Aparência > Personalizar**
5. Crie páginas e conteúdo

## Configuração Recomendada

### Menus
- **Menu Principal**: Home, Sobre Nós, Conteúdos, Projetos, Vídeos, Experiência, Imersão
- **Menu Rodapé**: Links do mapa do site

### Páginas Essenciais
- **Sobre Nós**: Informações da empresa
- **Projetos**: Portfólio de trabalhos
- **Contato**: Formulário e informações

### Customizer
- Configure o telefone e endereços
- Defina o horário de funcionamento
- Adicione logo personalizada

## Suporte

Para suporte técnico ou dúvidas sobre o tema, entre em contato através do painel WordPress ou consulte a documentação oficial do WordPress.

## Changelog

### Versão 1.0
- Lançamento inicial do tema
- Design responsivo completo
- Custom Post Types para Projetos e Produtos
- Sistema de newsletter
- Integração com Customizer
- Otimizações de performance

## Licença

Este tema segue as diretrizes do WordPress e é compatível com a GPL v2 ou posterior.

---

**Desenvolvido com ❤️ para ProFatto**