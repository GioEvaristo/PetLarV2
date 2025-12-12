-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/12/2025 às 03:01
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petlar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gabriel Machado', 'gabrielmachado@gmail.com', '$2y$12$kTxtaL9xOyLkoXmyCLAq1edvfU/9UdP095QOdKZJ63tboHXnyHauG', NULL, '2025-12-12 02:04:01', '2025-12-12 02:04:01'),
(2, 'Pedro Liló', 'pedrolilo@gmail.com', '$2y$12$3QVgCRXRoV7ZLjnlGrXSJeTrs7Prf8Q2gSnFEONFYlIMMySjYXgmu', NULL, '2025-12-12 04:57:49', '2025-12-12 04:57:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `interesses`
--

CREATE TABLE `interesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pet_id` bigint(20) UNSIGNED NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `motivacao` text NOT NULL,
  `infoadicional` text DEFAULT NULL,
  `status` enum('pendente','aprovado','rejeitado') NOT NULL DEFAULT 'pendente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `interesses`
--

INSERT INTO `interesses` (`id`, `pet_id`, `telefone`, `endereco`, `motivacao`, `infoadicional`, `status`, `created_at`, `updated_at`) VALUES
(7, 23, '35998795529', 'RUA PERGENTINO FERREIRA DA SILVA, 693', 'Porque amo equinos', NULL, 'aprovado', '2025-12-12 04:00:58', '2025-12-12 04:58:19'),
(10, 15, '35966448866', 'Rua dos Bobos, número 0', 'Estou disposto a cuidar e promover uma vida maravilhosa para a Juia', 'Quero muito!!', 'pendente', '2025-12-12 04:52:40', '2025-12-12 04:52:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_03_201744_create_pets_table', 1),
(5, '2025_10_17_010035_create_interesses_table', 2),
(6, '2025_12_10_171934_add_status_to_pets_table', 3),
(7, '2025_12_11_205831_create_admins_table', 3),
(8, '2025_12_11_231401_modify_idade_fields_in_pets_table', 4),
(9, '2025_12_11_232907_alter_descricao_to_text_in_pets_table', 5),
(10, '2025_12_12_003944_add_status_to_interesses_table', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pets`
--

CREATE TABLE `pets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `especie` varchar(255) NOT NULL,
  `raca` varchar(255) NOT NULL,
  `porte` varchar(255) NOT NULL,
  `pelagem` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  `idade_unidade` varchar(255) NOT NULL DEFAULT 'meses',
  `descricao` text DEFAULT NULL,
  `cor` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `castrado` varchar(255) NOT NULL,
  `vacinado` varchar(255) NOT NULL,
  `vermifugado` varchar(255) NOT NULL,
  `quaisVacinas` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'disponivel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pets`
--

INSERT INTO `pets` (`id`, `nome`, `especie`, `raca`, `porte`, `pelagem`, `idade`, `idade_unidade`, `descricao`, `cor`, `sexo`, `castrado`, `vacinado`, `vermifugado`, `quaisVacinas`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Fuligem', 'felina', 'SRD', 'pequeno', 'curta', 6, 'meses', 'Fuligem é uma gatinha filhote cheia de energia, travessuras e fofura. Com sua pelagem cinza macia, ela encanta qualquer um que a veja. Adora brinquedos, bolinhas e explorar lugares altos. Mesmo muito brincalhona, é extremamente carinhosa e procura o colo quando está cansada. Perfeita para famílias que desejam acompanhar o desenvolvimento de uma gatinha esperta e companheira. Adapta-se bem a outros pets e está pronta para encontrar seu lar definitivo.', 'cinza', 'femea', 'nao', 'sim', 'sim', 'Antirrábicaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'pets/ehexpb51eyRjNQHSN3F9T4VIgfkNIsyXpCI6B4E8.jpg', 'disponivel', '2025-12-12 02:32:19', '2025-12-12 02:46:03'),
(15, 'Juia', 'canina', 'Chiuaua', 'pequeno', 'curta', 2, 'anos', 'Juia é uma chihuahua de personalidade marcante. Pequena no tamanho, mas gigante na coragem, ela é daquelas que escolhe seus humanos preferidos e os protege com dedicação. Foi resgatada após viver em um ambiente com muitos animais e se adaptou rapidamente a uma rotina mais tranquila. É carinhosa, atenta e adora ficar no colo. Ideal para lares sem muita agitação e com tutores que compreendam seu jeito sensível e leal.', 'bicolor', 'femea', 'sim', 'sim', 'sim', 'Múltipla Polivalente', 'pets/FbHwAqp04k6oCfHohg0T7Hk7sceUn8b7rG3bqRf1.png', 'disponivel', '2025-12-12 02:48:21', '2025-12-12 02:51:20'),
(16, 'Luna', 'felina', 'SRD', 'pequeno', 'curta', 1, 'anos', 'Luna é uma gatinha curiosa, brincalhona e cheia de charme. Cresceu em um lar temporário onde aprendeu a conviver com outros gatos e se apaixonou por brinquedos de pena e arranhadores. Carinhosa e esperta, adora explorar cada cantinho, mas volta rápido para pedir um colo quentinho. Ideal para famílias que buscam uma gatinha meiga e sociável.', 'caramelo', 'femea', 'nao', 'sim', 'sim', 'Múltipla Polivalente, Antirrábica, Sei lá', 'pets/HE1wu06D9g2BDO10CnlJT98CoVcsAxtuts88PsFs.webp', 'adotado', '2025-12-12 02:54:53', '2025-12-12 03:03:58'),
(17, 'Panqueca', 'canina', 'Pug', 'pequeno', 'curta', 2, 'anos', 'Panqueca é um pug simpático e cheio de expressões engraçadas. Ele adora cochilar, receber carinho e acompanhar a família para onde for — especialmente se houver petiscos envolvidos. Foi entregue ao abrigo por uma família que não podia mais cuidar dele, mas não perdeu a alegria. Panqueca se dá bem com crianças, outros cães e adapta-se facilmente a diferentes rotinas. Perfeito para quem busca um pet afetuoso, de baixa energia e muita personalidade.', 'caramelo', 'macho', 'sim', 'sim', 'sim', 'V10, Antirrábica, Polivalente', 'pets/HBsQN0MvGdJeLtQNF4jyqDGHrtcpGxPST3C4bESK.webp', 'em_tratamento', '2025-12-12 03:07:27', '2025-12-12 03:07:27'),
(18, 'Polar', 'canina', 'Dachshund', 'pequeno', 'media', 1, 'anos', 'Polar é um salsichinha cheio de energia e personalidade! Ele adora brincar, correr atrás de bolinhas e seguir seus humanos pela casa inteira. Ainda jovem, está em fase de aprender comandos e precisa de uma família paciente e disposta a reforçar treinos positivos. Extremamente carinhoso, ele busca colo sempre que pode e cria vínculos fortes. Ideal para lares que tenham tempo para brincar e oferecer atividades mentais. Polar promete trazer alegria, bagunça boa e muito amor.', 'escaminha', 'macho', 'sim', 'nao', 'sim', 'Nenhuma', 'pets/z6Itd6TbZktyp4hQmD7BznCevY8J37ehD2f2WcrH.jpg', 'disponivel', '2025-12-12 03:09:47', '2025-12-12 03:09:47'),
(19, 'Sirius', 'felina', 'SRD', 'pequeno', 'curta', 4, 'anos', 'Com sua pelagem negra impecável e olhar profundo, Sirius é um gato reservado no início, mas extremamente afetuoso quando cria confiança. Ele foi resgatado próximo a uma escola, onde vivia recebendo petiscos dos alunos. Gosta de ambientes calmos e é um ótimo companheiro para quem aprecia momentos tranquilos, leituras e longos cochilos com um felino por perto. Sirius convive bem com outros gatos desde que introduzidos de forma gradual. Um companheiro elegante, sensível e cheio de charme.', 'preto', 'macho', 'nao', 'sim', 'nao', 'Antirrábica', 'pets/ddNNLNrOYOAvaQp0GeiF8G4bAiblZcOA6Xjjv2Tf.jpg', 'disponivel', '2025-12-12 03:11:39', '2025-12-12 03:11:39'),
(20, 'Amarelo', 'canina', 'SRD', 'medio', 'curta', 3, 'anos', 'Elegante e observador, Amarelo é um cão ativo e muito inteligente. Ele adora explorar novos ambientes, aprender comandos e se envolver em brincadeiras que estimulem sua mente. Foi abandonado em um parque, mas nunca perdeu a confiança nas pessoas — pelo contrário, busca sempre atenção e demonstra enorme gratidão. Amarelo é indicado para tutores que gostam de passeios e atividades diárias. Ele se dá bem com outros cães e tem energia na medida certa: brincalhão, mas tranquilo dentro de casa.', 'caramelo', 'macho', 'nao', 'sim', 'sim', 'V10, Antirrábica, Polivalente', 'pets/RE5RezXmoH926tBiRYR0LvrcRnMlWGiUh2fH7nEn.png', 'adotado', '2025-12-12 03:13:50', '2025-12-12 03:13:50'),
(21, 'Preta', 'canina', 'SRD', 'grande', 'curta', 8, 'meses', 'Preta é uma gigante gentil com alma de filhote. Apesar da idade, ela ainda brinca com entusiasmo e adora se deitar ao sol para relaxar. Foi encontrada em um estacionamento onde buscava abrigo e rapidamente encantou todos com sua meiguice. Preta é extremamente leal, paciente e boa para famílias com crianças maiores. Gosta de companhia constante e fica muito feliz quando participa da rotina da casa. Uma companheira tranquila, carinhosa e pronta para viver seus anos com conforto e afeto.', 'preto', 'femea', 'sim', 'sim', 'sim', 'Múltipla Polivalente, Antirrábica', 'pets/af1P7ChsLqPTQZN5uB42d3YTDqBKwA7fzWlyriYG.png', 'disponivel', '2025-12-12 03:14:54', '2025-12-12 03:14:54'),
(22, 'Nildo', 'canina', 'SRD', 'medio', 'curta', 6, 'anos', 'Faxinildo, um dos cachorros mais amados de Varginha, carinhosamente apelidado como “Nildo” (ou ainda, “Nirdo”), é um dos três caezinhos do Campus Varginha do CEFET-MG. Ele gosta muito de denguinho e é bem calmo (a não ser que se assuste ou sua missão de guardião do CEFET o chame). \r\n  Seu hobbie preferido é caminhar pelo CEFET acompanhando seus amigos Preta e Amarelo por diversas aventuras, como caça a ratos e exploração de cantinhos novos do Campus; mas, por vezes, gosta de aproveitar um tempo sozinho, relaxando enquanto pega seu bronzeado diário, não achou mesmo que essa cor caramelo perfeita se mantém sozinha, né? \r\nEle também gosta muito dos funcionários, em especial seu papai humano, um funcionário que sempre o dá muito amor e carinho!', 'caramelo', 'macho', 'sim', 'sim', 'sim', 'Antirrábica', 'pets/SGTKGz0lCXwGHFSKYgOWTkmInxU3r7oGZlZOxv3z.jpg', 'adotado', '2025-12-12 03:16:26', '2025-12-12 03:16:26'),
(23, 'James Baxter', 'outro', 'Mangalarga Marchador', 'grande', 'curta', 4, 'anos', 'James Baster é um Mangalarga Marchador de postura imponente e temperamento excepcionalmente dócil. Com seus movimentos elegantes e marcha confortável, ele chama atenção por onde passa — mas seu maior charme é a personalidade tranquila e confiante. Resgatado de uma situação em que não recebia os cuidados necessários, James se recuperou muito bem e hoje demonstra enorme gratidão e carinho por quem o trata com respeito.\r\n\r\nExtremamente inteligente e responsivo, ele aprende rápido e gosta de atividades que estimulem sua mente. É ideal para cavalgadas leves, acompanhamento em trilhas ou para quem busca um companheiro para práticas recreativas. James se dá muito bem com outros equinos e está acostumado à rotina de piquete, manejo diário e interação com pessoas.\r\n\r\nSaudável, vermifugado e com exames em dia, James Baster está pronto para encontrar um lar definitivo, de preferência um tutor que valorize seu bem-estar, ofereça espaço adequado e deseje construir um vínculo forte e afetuoso. Se você procura um cavalo nobre, sensível e equilibrado, James é a escolha perfeita para compartilhar seus dias com leveza e parceria.', 'outros', 'macho', 'nao', 'sim', 'sim', 'Gripe equina', 'pets/cAXSb26gQFHrKIqjU9tOSQ3H7bZUR9QcppyjAlQy.jpg', 'disponivel', '2025-12-12 03:26:05', '2025-12-12 03:26:05'),
(24, 'Chico', 'felina', 'SRD', 'medio', 'curta', 1, 'meses', 'Chico é um gato frajola muito fofo em busca de um lar!', 'frajola', 'macho', 'nao', 'nao', 'sim', 'Nenhuma', 'pets/UxQoslXM6gmnropMWhiJinxnKnyMfzgqwvbzXHN3.jpg', 'disponivel', '2025-12-12 04:56:06', '2025-12-12 04:56:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `interesses`
--
ALTER TABLE `interesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interesses_pet_id_foreign` (`pet_id`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `interesses`
--
ALTER TABLE `interesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `interesses`
--
ALTER TABLE `interesses`
  ADD CONSTRAINT `interesses_pet_id_foreign` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
