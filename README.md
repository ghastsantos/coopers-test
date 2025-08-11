# 🎯 Coopers Theme - WordPress Landing Page

![WordPress](https://img.shields.io/badge/WordPress-21759B?style=for-the-badge&logo=wordpress&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)

Um tema WordPress moderno e responsivo desenvolvido especialmente para a **Coopers Digital**, com design clean, funcionalidades avançadas e otimização completa para todos os dispositivos.

---

## 📋 Índice

- [Sobre o Projeto](#-sobre-o-projeto)
- [Funcionalidades](#-funcionalidades)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Instalação](#-instalação)
- [Configuração](#-configuração)
- [Componentes](#-componentes)
- [Responsividade](#-responsividade)
- [ACF (Advanced Custom Fields)](#-acf-advanced-custom-fields)
- [JavaScript](#-javascript)
- [CSS Features](#-css-features)
- [Performance](#-performance)
- [Browser Support](#-browser-support)
- [Contribuição](#-contribuição)
- [Licença](#-licença)

---

## 🎨 Sobre o Projeto

- ✅ **Design Responsivo** - Funciona perfeitamente em todos os dispositivos
- ✅ **Performance Otimizada** - Carregamento rápido e eficiente
- ✅ **SEO Friendly** - Estrutura semântica e otimizada para buscadores
- ✅ **Acessibilidade** - Seguindo padrões WCAG
- ✅ **Código Limpo** - Estrutura organizada e bem documentada

---

## 🚀 Funcionalidades

### 🎯 Seções Principais
- **Hero Section** - Área de destaque com call-to-action
- **To-do List** - Apresentação de funcionalidades
- **Plans Section** - Planos e preços
- **Carousel** - Showcase de projetos/serviços
- **Contact Form** - Formulário de contato funcional

### 💎 Features Avançadas
- **Carousel Responsivo** - Sistema de páginas com navegação por dots
- **Formulário Inteligente** - Validação em tempo real
- **Animações Suaves** - Transições e efeitos CSS
- **Mobile First** - Design otimizado para dispositivos móveis
- **Touch Support** - Gestos de swipe no carousel
- **Keyboard Navigation** - Navegação por teclado acessível

---

## 🛠 Tecnologias Utilizadas

### Backend
- **WordPress 6.x** - CMS base
- **PHP 8.x** - Linguagem de programação
- **Advanced Custom Fields** - Gerenciamento de conteúdo

### Frontend
- **HTML5** - Estrutura semântica
- **CSS3** - Estilização moderna com Grid/Flexbox
- **JavaScript ES6** - Interatividade e funcionalidades
- **Google Fonts** - Tipografia (Montserrat)

### Ferramentas & Metodologias
- **Mobile First Design** - Desenvolvimento para mobile primeiro
- **Progressive Enhancement** - Melhoria progressiva
- **Semantic HTML** - HTML semântico
- **CSS Grid & Flexbox** - Layouts modernos
- **CSS Custom Properties** - Variáveis CSS

---

## 📁 Estrutura do Projeto

```
coopers-theme/
├── 📁 assets/
│   └── 📁 images/           # Imagens do tema
│       ├── hero-bg.jpg
│       ├── icon-mail.png
│       └── todo-bg.png
├── 📁 inc/                  # Includes do WordPress
├── 📁 js/                   # JavaScript
│   └── main.js             # Funcionalidades principais
├── 📁 template-parts/       # Componentes modulares
│   ├── section-hero.php    # Seção hero
│   ├── section-todolist.php # Seção to-do list
│   ├── section-plans.php   # Seção de planos
│   ├── section-carousel.php # Carousel de projetos
│   └── section-contact.php # Formulário de contato
├── 📄 style.css            # Estilos principais
├── 📄 functions.php        # Funções do WordPress
├── 📄 header.php           # Cabeçalho
├── 📄 footer.php           # Rodapé
├── 📄 front-page.php       # Página inicial
└── 📄 index.php            # Template base
```

---

## 💻 Instalação

### Pré-requisitos
- WordPress 5.0 ou superior
- PHP 7.4 ou superior
- Plugin Advanced Custom Fields (gratuito)

### Passo a Passo

1. **Clone/Download do tema**
   ```bash
   cd wp-content/themes/
   git clone [repositório] coopers-theme
   ```

2. **Ativação no WordPress**
   - Acesse: `Aparência > Temas`
   - Ative o tema "Coopers Theme"

3. **Instalação do ACF**
   - Vá em `Plugins > Adicionar novo`
   - Busque por "Advanced Custom Fields"
   - Instale e ative a versão gratuita

4. **Configuração inicial**
   - Configure os campos ACF
   - Adicione as imagens necessárias

---

## ⚙️ Configuração

### 1. Google Fonts
O tema já inclui a fonte **Montserrat** automaticamente via `functions.php`:

```php
wp_enqueue_style(
    'coopers-google-fonts',
    'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap'
);
```

### 2. Enfileiramento de Scripts
```php
wp_enqueue_script(
    'coopers-theme-main',
    get_template_directory_uri() . '/js/main.js',
    array(),
    _S_VERSION,
    true
);
```

### 3. Suporte a Recursos
```php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('automatic-feed-links');
```

---

## 🧩 Componentes

### 🦸 Hero Section
**Arquivo:** `template-parts/section-hero.php`

- Background dinâmico com overlay
- Título e subtítulo editáveis via ACF
- Call-to-action button responsivo
- Imagem de destaque

**Campos ACF:**
- `hero_title` - Título principal
- `hero_subtitle` - Subtítulo
- `hero_description` - Descrição
- `hero_button_text` - Texto do botão
- `hero_button_url` - URL do botão

### 📝 To-do List Section
**Arquivo:** `template-parts/section-todolist.php`

- Background diagonal estilizado
- Conteúdo editável via ACF
- Design moderno com linha decorativa

### 💰 Plans Section
**Arquivo:** `template-parts/section-plans.php`

- Showcase de planos/serviços
- Layout flexível e responsivo
- Cards com hover effects

### 🎠 Carousel Section
**Arquivo:** `template-parts/section-carousel.php`

- Sistema de páginas responsivo
- Navegação por dots
- Suporte a touch/swipe
- 3 cards desktop, 2 cards tablet, 1 card mobile

**JavaScript:** Controle automático de navegação

### 📧 Contact Section
**Arquivo:** `template-parts/section-contact.php`

- Formulário funcional com validação
- Design split-screen
- Photo com efeito zoom
- Feedback visual de envio

---

## 📱 Responsividade

### Breakpoints Principais

```css
/* Mobile First */
@media (max-width: 768px) { /* Mobile */ }
@media (min-width: 769px) and (max-width: 1024px) { /* Tablet */ }
@media (min-width: 1025px) and (max-width: 1199px) { /* Desktop pequeno */ }
@media (min-width: 1200px) { /* Desktop grande */ }
```

## 👨‍💻 Autor

**Gastão Eduardo Santos Borges**
- 💼 LinkedIn: [LinkedIn Profile](https://linkedin.com/in/gastaoesb2606)

---

<div align="center">

**⭐ Se este projeto te ajudou, considere dar uma estrela!**

**Desenvolvido com ❤️ para a Coopers Digital**

</div>
