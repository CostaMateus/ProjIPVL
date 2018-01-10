-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Dez-2017 às 14:02
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipvl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ip_msgs`
--

CREATE TABLE `ip_msgs` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ip_msgs`
--

INSERT INTO `ip_msgs` (`id`, `title`, `text`, `category`, `image`, `active`) VALUES
(1, 'Meu chão é o céu', '<br>\r\nHá guerras pelo terror –<br>\r\ne a chamam de Santa.<br>\r\nEnquanto o mundo está de cabeça para baixo:<br>\r\no meu chão é o céu.<br>\r\n<br>\r\nA verdade é relativa –<br>\r\ndesde que seja imoral.<br>\r\nEnquanto o mundo está de cabeça para baixo:<br>\r\no meu chão é o céu.<br>\r\n<br>\r\nOs injustos clamam à justiça –<br>\r\nexceto para os compadres.<br>\r\nEnquanto o mundo está de cabeça para baixo:<br>\r\no meu chão é o céu.<br>\r\n<br>\r\nAs ovelhas mais pobres<br>\r\nfazem os lobos mais ricos.<br>\r\nEnquanto o mundo está de cabeça para baixo:<br>\r\no meu chão é o céu.<br>\r\n<br>\r\nMas a Palavra reflete o céu –<br>\r\nnela meus pés caminham.<br>\r\nEnquanto o mundo está de cabeça para baixo:<br>\r\no meu chão é o céu.<br>', 'pregacao', 'cruz.png', 1),
(2, 'Guarde seu corpo', 'Em muitos contextos, entrar na Universidade não significa a preparação para uma carreira, mas a fase de vida em que se usufrui de um banquete de desejos. Espera-se na Universidade maior liberdade para a experiência sexual, e as festas e os bares estarão lá, postos para conduzir os estudantes nessa direção.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Para um jovem cristão, que procura andar no caminho do Senhor, mesmo que não tenha essa expectativa da Universidade, certamente será severamente tentado nessa área.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Primeiro, porque estará numa fase cujo corpo está pronto e os motores estarão ligados para a sexualidade. Nessa fase, o casamento já deveria ter ocorrido, mas a complexidade de nossa sociedade nos faz adiá-lo e, assim, maltratamos o corpo.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Segundo porque, provavelmente, o estudante morará longe dos olhos vigilantes e ensinadores dos pais. Poderá morar sozinho, ou ficar bastante tempo sozinho enquanto os companheiros de república viajam. A casa vazia será um convite para o pecado.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Por isso, mais do que em outras fases da vida, o estudante deve estar preparado para proteger o seu corpo da impureza sexual.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Mas, por que Deus se importa tanto com nossa sexualidade? Por que preservar o corpo da imoralidade sexual, do sexo casual, de práticas libidinosas com namorado ou namorada?\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nPrimeiro, porque o corpo não é nosso mas é de Deus e é templo do Espírito Santo:\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;<b>\r\n“Fujam da imoralidade sexual. Todos os outros pecados que alguém comete, fora do corpo os comete; mas quem peca sexualmente, peca contra o seu próprio corpo. Acaso não sabem que o corpo de vocês é santuário do Espírito Santo que habita em vocês, que lhes foi dado por Deus, e que vocês não são de si mesmos? Vocês foram comprados por alto preço. Portanto, glorifiquem a Deus com o corpo de vocês” – 1Co.6.18-20.</b>\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nNós glorificamos ou desonramos a Deus com o nosso corpo. O nosso corpo não é nosso, somente. Foi comprado por Deus. Quando o sujamos, fazendo com ele aquilo para o que ele não foi criado, ou fora do tempo determinado para isso, então o tornamos impuro. Quando, por outro lado, guardamos puro o nosso corpo, fazendo de nosso corpo aquilo para o qual ele foi feito, e no tempo certo para isso, assim nós glorificamos a Deus.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nO segundo motivo do porquê devemos guardar nosso corpo da imoralidade é porque nosso corpo não é nosso, mas de nosso futuro marido ou esposa, e é o jardim fechado deles.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nA mulher diz: “Como uma macieira entre as árvores da floresta é o meu amado entre os jovens” Ct.2.3. Ela não quer as árvores do bosque. Ela quer apenas a sua macieira. Já o marido, diz: “Você é um jardim fechado, minha irmã, minha noiva; você é uma nascente fechada, uma fonte selada” Ct.4.12. Nesse jardim, apenas um homem tem direito a entrar e se deleitar. O jardim foi guardado para ele.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nO marido e a esposa dizem um ao outro: “Eu sou do meu amado, e o meu amado é meu; ele descansa entre os lírios” Ct.6.3. Eles pertencem um ao outro! Eles querem um relacionamento exclusivo e até a morte:\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;<b>\r\n“Coloque-me como um selo sobre o seu coração; como um selo sobre o seu braço; pois o amor é tão forte quanto a morte, e o ciúme é tão inflexível quanto a sepultura. Suas brasas são fogo ardente, são labaredas do Senhor.\r\nNem muitas águas conseguem apagar o amor; os rios não conseguem levá-lo na correnteza. Se alguém oferecesse todas as riquezas da sua casa para adquirir o amor, seria totalmente desprezado” – Ct.8.6-7</b>\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nDeus planejou o sexo para o deleite entre um homem e uma mulher, unidos pelo laço inquebrável do casamento, fortalecido pela fidelidade e amor, guiado por Deus.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nVocê deve guardar o seu corpo porque ele não é seu. Ele é de Deus e de seu futuro cônjuge. Ele é templo do Espírito Santo e é Jardim Fechado.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nNo casamento, você receberá o seu banquete, você provará do fruto virginal: a pureza do corpo.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nMas a questão é mais profunda: como conter o vulcão indomável da vontade do corpo?\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nPrimeiro, um ensino do apóstolo Paulo nos ajuda a responder:\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;<b>\r\n“Se não conseguem controlar-se, devem casar-se, pois é melhor casar-se do que ficar ardendo de desejo” 1Co.7.9.</b>\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nO ensino é duro, mas favorável a Deus. Os pagão é que adiam o casamento por causa de recursos materiais. Os filhos de Deus escolhem a fidelidade, pois sabem que o Senhor acrescentará todas as coisas de que precisam (Mt.6.31-34).\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nEm segundo lugar, um ensino do apóstolo Pedro:\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;<b>\r\n“Seu divino poder nos deu todas as coisas de que necessitamos para a vida e para a piedade, por meio do pleno conhecimento daquele que nos chamou para a sua própria glória e virtude” 2Pe.1.3.</b>\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nNão nos falta nada para guardarmos o corpo. Nunca poderemos argumentar que foi inevitável. Nunca poderemos dizer que foi uma tentação mais forte do que podemos suportar.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nAquele que se alimenta da Palavra de Deus, da oração, e da comunhão com a igreja estará suficientemente saciado para guardar o corpo. Os meios de graça nos abastecem com o suficiente para uma vida de santidade.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nForam os meios de graça que auxiliaram Jesus após quarenta dias em jejum, no deserto. Ele venceu a tentação, nós também podemos vencer.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nFinalmente, um ensino do apóstolo João:\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;<b>\r\n“Meus filhinhos, escrevo-lhes estas coisas para que vocês não pequem. Se, porém, alguém pecar, temos um intercessor junto ao Pai, Jesus Cristo, o Justo” 1Jo.2.1</b>\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nJoão afirma anteriormente que aquele que ama a Deus faz a vontade de Deus. No entanto, é possível que, por um momento, você tenha sido vencido por Satanás e entristeceu o Espírito Santo. E Deus, em sua graça, trouxe-lhe arrependimento. A boa notícia é que em Jesus Cristo há o perdão de pecados. E ele torna puro o nosso caminho.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nEm sua graça, ele nos justifica, e purifica o nosso corpo, quando verdadeiramente nos arrependemos de nossos pecados.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nPor isso, fujam da imoralidade, porque isso entristece a Deus. Guardem o corpo, pois nosso corpo é de Deus e do seu casamento. Mas, se Satanás o vencer em uma tentação, Jesus é fiel e justo para perdoar os pecados e purificar de toda injustiça!\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;\r\nComo é bom servir a Deus!', 'estudo', 'construcao.png', 1),
(3, 'O abismo entre a boca e o coração', '\"Creio, ajuda-me a vencer a minha incredulidade!\" (Mc.9.24).\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;>Há, no homem, um grande abismo que separa dois despenhadeiros pedregosos. Esse abismo chama-se Hipocrisia, e os dois montes dramaticamente separados chamam-se Crença e Credo. O credo é o que dizemos crer, mas a crença é o que de fato cremos. O credo está na boca, mas a crença está no coração.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Em Marcos 14, vemos Pedro se enrolando com suas próprias as palavras. Nos vs. 27-31, Jesus afirma que os discípulos o abandonariam. Mas Pedro, resoluto, negou (v.29). Então, Jesus diz além, afirmando que Pedro o negaria três vezes. Mas o apóstolo insistiu, se enrolando ainda mais: \"Mesmo que seja preciso que eu morra contigo, nunca te negarei\" (v.31).\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Acontece que as palavras de Pedro estavam longe do seu coração. Nós sabemos o que aconteceu. Jesus tinha razão. Diante de ameaças, Pedro de fato negou a Jesus três vezes (v.66-72).\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Mas ele fez pior. Antes disso, no Getsêmani, Jesus havia pedido a Pedro e aos discípulos que vigiassem com Ele em oração. No entanto, os discípulos dormiram! Por três vezes Jesus encontrou os discípulos dormindo e os advertiu: \"Vocês ainda dormem e descansam? Basta!\" (v.41). Sem qualquer ameaça de morte, Pedro sequer era capaz de vencer o sono para vigiar em oração com Jesus, quanto mais morrer por Ele!\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Um discípulo de Jesus deveria levar muito a sério o que diz, pois possui um compromisso com a verdade. A confissão da verdade é a porta de entrada para a vida cristã: \"Se você confessar com a sua boca que Jesus é Senhor e crer em seu coração que Deus o ressuscitou dentre os mortos, será salvo. Pois com o coração se crê para justiça, e com a boca se confessa para salvação\" (Rm.10.9-10).\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Ser coerente com o que professa crer é uma das marcas de um discípulo, é a demonstração de que a verdade gerou frutos em seu coração. Devemos zelar com o que falamos para Deus. Cantamos na igreja \"Tudo entregarei\", mas naquele mesmo culto sonegamos o dízimo.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Mas também devemos cuidar do coração. Devemos sondar o coração para compreender por que sua alma anda ansiosa se ontem mesmo você cantava \"Tu és soberano sobre a terra\". Devemos viver e falar movidos pela verdade.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Na angústia de uma vida com este distúrbio entre o credo e a crença, podemos fazer a oração daquele pai desesperado: \"Creio, ajuda-me a vencer a minha incredulidade!\" (Mc.9.24). Cremos, mas precisamos crer mais para gerar frutos em nossas palavras e atitudes.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Nós cremos, mas precisamos crescer na fé e no conhecimento. O Senhor precisa agir na nossa fé para que nossa vida seja mais verdadeira.\r\n<br>\r\n<br>\r\n&emsp;&emsp;&emsp;&emsp;Quando tiver um tempinho, sonde as incoerências da sua vida, entregue ao Senhor e faça aquela oração: \"Creio, ajuda-me a vencer a minha incredulidade!\" (v.24).', 'devocional', 'cdd.png', 1),
(4, 'Imagem padrao teste', 'Mussum Ipsum, cacilds vidis litro abertis. Quem manda na minha terra sou euzis! Interagi no mé, cursus quis, vehicula ac nisi. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.\n<br><br>\nA ordem dos tratores não altera o pão duris. Mé faiz elementum girarzis, nisi eros vermeio. Sapien in monti palavris qui num significa nadis i pareci latim. Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio.\n<br><br>\nCasamentiss faiz malandris se pirulitá. Não sou faixa preta cumpadi, sou preto inteiris, inteiris. Cevadis im ampola pa arma uma pindureta. Paisis, filhis, espiritis santis.\n<br><br>\nPosuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Praesent malesuada urna nisi, quis volutpat erat hendrerit non. Nam vulputate dapibus. Delegadis gente finis, bibendum egestas augue arcu ut est. Per aumento de cachacis, eu reclamis.\n<br><br>\nTá deprimidis, eu conheço uma cachacis que pode alegrar sua vidis. Vehicula non. Ut sed ex eros. Vivamus sit amet nibh non tellus tristique interdum. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.', 'devocional', '', 1),
(5, 'Mussum Ipsum JN', 'Mussum Ipsum, cacilds vidis litro abertis. Cevadis im ampola pa arma uma pindureta. Per aumento de cachacis, eu reclamis. Si num tem leite então bota uma pinga aí cumpadi! Casamentiss faiz malandris se pirulitá.\r\n<br><br>\r\nSuco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Leite de capivaris, leite de mula manquis sem cabeça. Em pé sem cair, deitado sem dormir, sentado sem cochilar e fazendo pose. Viva Forevis aptent taciti sociosqu ad litora torquent.\r\n<br><br>\r\nNullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio. Mé faiz elementum girarzis, nisi eros vermeio. Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis! In elementis mé pra quem é amistosis quis leo.\r\n<br><br>\r\nSuco de cevadiss deixa as pessoas mais interessantis. Admodum accumsan disputationi eu sit. Vide electram sadipscing et per. Aenean aliquam molestie leo, vitae iaculis nisl. Diuretics paradis num copo é motivis de denguis.\r\n<br><br>\r\nPosuere libero varius. Nullam a nisl ut ante blandit hendrerit. Aenean sit amet nisi. Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl. Atirei o pau no gatis, per gatis num morreus. Praesent vel viverra nisi. Mauris aliquet nunc non turpis scelerisque, eget.', 'pregacao', 'mussum.jpg', 1),
(6, 'Lorem Ipsum 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Libero volutpat sed cras ornare. Pellentesque nec nam aliquam sem et tortor consequat id. Eget felis eget nunc lobortis mattis aliquam. Amet dictum sit amet justo donec. Amet consectetur adipiscing elit pellentesque habitant. Arcu dictum varius duis at consectetur lorem donec. Nec dui nunc mattis enim ut tellus elementum. Diam ut venenatis tellus in. Diam maecenas sed enim ut sem viverra aliquet eget. Eget aliquet nibh praesent tristique magna sit amet purus. Tortor condimentum lacinia quis vel eros.\r\n<br><br>\r\nAmet mattis vulputate enim nulla. Vivamus at augue eget arcu dictum. Ultricies tristique nulla aliquet enim tortor at. Malesuada proin libero nunc consequat. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Amet consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Bibendum ut tristique et egestas. Justo nec ultrices dui sapien eget mi proin sed. Elementum nibh tellus molestie nunc non. Semper feugiat nibh sed pulvinar proin gravida. Imperdiet sed euismod nisi porta lorem mollis aliquam ut.\r\n<br><br>\r\nSociis natoque penatibus et magnis. Odio tempor orci dapibus ultrices in iaculis nunc sed. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Tincidunt augue interdum velit euismod. Tristique senectus et netus et malesuada. Commodo nulla facilisi nullam vehicula ipsum a arcu. Egestas fringilla phasellus faucibus scelerisque. Tincidunt lobortis feugiat vivamus at augue. Faucibus a pellentesque sit amet porttitor eget dolor morbi. Ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. Eget felis eget nunc lobortis mattis aliquam faucibus. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Sit amet nulla facilisi morbi tempus iaculis urna id. Nunc id cursus metus aliquam eleifend mi in nulla posuere. Eu nisl nunc mi ipsum faucibus vitae. Vitae purus faucibus ornare suspendisse sed nisi. Aenean sed adipiscing diam donec adipiscing tristique risus. Tincidunt nunc pulvinar sapien et. Maecenas ultricies mi eget mauris pharetra et ultrices neque ornare. Eget sit amet tellus cras.\r\n<br><br>\r\nHac habitasse platea dictumst quisque sagittis purus sit amet. Turpis massa sed elementum tempus egestas. Auctor neque vitae tempus quam pellentesque nec nam. Id interdum velit laoreet id donec ultrices. Suspendisse ultrices gravida dictum fusce ut. Enim neque volutpat ac tincidunt vitae semper. Purus sit amet luctus venenatis lectus magna fringilla urna. Lacinia quis vel eros donec ac odio tempor orci dapibus. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Nibh nisl condimentum id venenatis a.\r\n<br><br>\r\nSit amet venenatis urna cursus eget nunc scelerisque viverra mauris. Pellentesque id nibh tortor id aliquet. Ornare quam viverra orci sagittis. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Ac odio tempor orci dapibus ultrices. Ultrices eros in cursus turpis massa. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Quis hendrerit dolor magna eget est lorem. Feugiat in fermentum posuere urna nec tincidunt praesent. Nisi scelerisque eu ultrices vitae auctor eu augue. Eu consequat ac felis donec et. Sed elementum tempus egestas sed. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Fringilla ut morbi tincidunt augue.', 'estudo', 'lorem.jpg', 1),
(7, 'Imagem padrao 1', 'Imagem padrao acima, para casos de a postagem não conter uma propria. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Libero volutpat sed cras ornare. Pellentesque nec nam aliquam sem et tortor consequat id. Eget felis eget nunc lobortis mattis aliquam. Amet dictum sit amet justo donec. Amet consectetur adipiscing elit pellentesque habitant. Arcu dictum varius duis at consectetur lorem donec. Nec dui nunc mattis enim ut tellus elementum. Diam ut venenatis tellus in. Diam maecenas sed enim ut sem viverra aliquet eget. Eget aliquet nibh praesent tristique magna sit amet purus. Tortor condimentum lacinia quis vel eros.\n<br><br>\nAmet mattis vulputate enim nulla. Vivamus at augue eget arcu dictum. Ultricies tristique nulla aliquet enim tortor at. Malesuada proin libero nunc consequat. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Amet consectetur adipiscing elit duis tristique sollicitudin nibh sit amet. Bibendum ut tristique et egestas. Justo nec ultrices dui sapien eget mi proin sed. Elementum nibh tellus molestie nunc non. Semper feugiat nibh sed pulvinar proin gravida. Imperdiet sed euismod nisi porta lorem mollis aliquam ut.\n<br><br>\nSociis natoque penatibus et magnis. Odio tempor orci dapibus ultrices in iaculis nunc sed. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Tincidunt augue interdum velit euismod. Tristique senectus et netus et malesuada. Commodo nulla facilisi nullam vehicula ipsum a arcu. Egestas fringilla phasellus faucibus scelerisque. Tincidunt lobortis feugiat vivamus at augue. Faucibus a pellentesque sit amet porttitor eget dolor morbi. Ultrices mi tempus imperdiet nulla malesuada pellentesque elit eget. Eget felis eget nunc lobortis mattis aliquam faucibus. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Sit amet nulla facilisi morbi tempus iaculis urna id. Nunc id cursus metus aliquam eleifend mi in nulla posuere. Eu nisl nunc mi ipsum faucibus vitae. Vitae purus faucibus ornare suspendisse sed nisi. Aenean sed adipiscing diam donec adipiscing tristique risus. Tincidunt nunc pulvinar sapien et. Maecenas ultricies mi eget mauris pharetra et ultrices neque ornare. Eget sit amet tellus cras.\n<br><br>\nHac habitasse platea dictumst quisque sagittis purus sit amet. Turpis massa sed elementum tempus egestas. Auctor neque vitae tempus quam pellentesque nec nam. Id interdum velit laoreet id donec ultrices. Suspendisse ultrices gravida dictum fusce ut. Enim neque volutpat ac tincidunt vitae semper. Purus sit amet luctus venenatis lectus magna fringilla urna. Lacinia quis vel eros donec ac odio tempor orci dapibus. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Nibh nisl condimentum id venenatis a.\n<br><br>\nSit amet venenatis urna cursus eget nunc scelerisque viverra mauris. Pellentesque id nibh tortor id aliquet. Ornare quam viverra orci sagittis. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum integer. Ac odio tempor orci dapibus ultrices. Ultrices eros in cursus turpis massa. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Quis hendrerit dolor magna eget est lorem. Feugiat in fermentum posuere urna nec tincidunt praesent. Nisi scelerisque eu ultrices vitae auctor eu augue. Eu consequat ac felis donec et. Sed elementum tempus egestas sed. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam. Fringilla ut morbi tincidunt augue.', 'estudo', '', 1),
(8, 'Apunhalado pela calúnia', '\"Eles me cercaram com palavras carregadas de ódio; atacaram-me sem motivo. Em troca da minha amizade eles me acusam\" – Sl.109.3-4.\r\n<br><br>\r\nA calúnia é a fofoca mentirosa espalhada pelos falsos amigos para destruir a honra alheia. A calúnia faz da língua um punhal e do ouvido da multidão as costas do inimigo. A calúnia, armada do ódio, cerca e ataca aqueles que se oferecem como amigos: “Eles me cercaram com palavras carregadas de ódio; atacaram-me sem motivo. Em troca da minha amizade eles me acusam” – v.3-4.\r\nPor isso, o autor do Salmo 109 aponta que o caluniador deve ser acusado por Satanás na presença de Deus: “à sua direita esteja um acusador. Seja declarado culpado no julgamento, e que até a sua oração seja considerada pecado” (v.6-7). Sua vida e até a sua família devem ser destruídas (v.8-9), e seus filhos devem padecer na miséria (.v10). Ele deve perder tudo o que um dia conquistou (v.11-13).\r\n<br><br>\r\nEsse extremismo no juízo ao caluniador não é sem razão. O coração daquele que calunia bombeia um sangue maligno: “ele jamais pensou em praticar um ato de bondade, mas perseguiu até à morte o pobre, o necessitado e o de coração partido” (v.16). Os efeitos de sua língua são criminosos, mas as feridas são vistas e sentidas apenas na solidão da vítima, que tem o coração abatido (como o gado), definha o ânimo nas trevas e destrói o corpo, pois expõem a honra do homem à zombaria das multidões: “Sou pobre e necessitado e, no íntimo, o meu coração está abatido. Vou definhando como a sombra vespertina; para longe sou lançado, como um gafanhoto. De tanto jejuar os meus joelhos fraquejam e o meu corpo definha de magreza. Sou motivo de zombaria para os meus acusadores; logo que me vêem, meneiam a cabeça” (v.22-25).\r\n<br><br>\r\nNo entanto, quem de nós possui os lábios puros para orar contra o caluniador? Quem não estaria no meio da multidão escarnecedora diante de Jesus subindo o Gólgota com sua cruz amaldiçoada? Quem se assemelha a Cristo que, diante dos seus caluniadores, sendo Ele o único justo, fala ao Pai: “Perdoa-lhes, pois não sabem o que estão fazendo” (Lc.23.34)?\r\n<br><br>\r\nEste salmo nos ensina uma lição preciosa sobre como lidar com a calúnia. A confiar a Deus a própria honra pela oração com ações de graças: “Em troca da minha amizade eles me acusam, mas eu permaneço em oração (…) Em alta voz, darei muitas graças ao Senhor; no meio da assembléia eu o louvarei, pois ele se põe ao lado do pobre para salvá-lo daqueles que o condenam” – Sl.109.4, 30-31.', 'devocional', 'caluniador.png', 1),
(9, 'A fraqueza de Sansão', '“Assim, na sua morte, Sansão matou mais homens do que em toda a sua vida” – Jz.16-30.\r\n<br><br>\r\nSansão não deve nada ao incrível Hulk. O homem era tão forte que a Bíblia diz que ele rasgou um leão vivo (14.6); em sua festa de noivado, matou 30 filisteus; capturou 300 raposas e destruiu a safra de trigo dos inimigos (15.3-5); causou uma matança dos assassinos de seu sogro e esposa (15.7-8); com a carcaça de um jumento matou mil homens (15.15); e fugindo na madrugada, arrancou os portais de uma cidade (16.5).\r\n<br><br>\r\nApesar disso, Sansão foi um homem que não soube lidar com suas fraquezas: era tão orgulhoso que não ouviu seus pais a respeito de seu casamento com uma estrangeira (14.3); aproximou-se do leão morto, quebrando seu voto de nazireu (14.8); foi injusto e violento quando perdeu seu jogo de adivinha (14.18); e com seu sogro e vizinhos quando contrariado (15.1-8). Outra fraqueza de Sansão eram as mulheres: sua primeira esposa arrancou-lhe o segredo da adivinhação (14.15-17); Em Gaza, envolveu-se com uma prostituta e quase caiu em uma cilada (16.1-3); com Dalila, finalmente, entregou o principal segredo de sua força, e isto foi a sua ruína.\r\n<br><br>\r\nA força de Sansão vinha do Senhor, já a fraqueza vinha dele mesmo, de seu orgulho, violência e imoralidade. A força do Senhor em Sansão libertou Israel das mãos dos filisteus; a fraqueza de Sansão o levou à prisão, à cegueira e à morte. Sansão confiou na sua força e não cuidou de sua fraqueza. Sansão tinha fé em Deus, mas não tinha o temor do Senhor. Ele acreditava que Deus o serviria indefinidamente e estaria cego quanto aos seus pecados. Cego estava Sansão.\r\n<br><br>\r\nHumilhado, Sansão recebe uma última chance de restaurar o seu serviço ao Senhor e garantir sua entrada na galeria dos heróis da fé. À custa de sua vida, abalou as estruturas do templo de Dagom, trazendo abaixo o templo e milhares de idólatras. Sansão foi cego à sua morte. Jesus Cristo, por sua vez, caminhou de olhos abertos até a cruz, entregando-se voluntariamente, e em sua morte, trouxe abaixo os templos dos deuses que cegavam homens como Sansão, eu e você. Por isso, hoje, Jesus Cristo é a nossa força, que nos capacita para vencer nosso orgulho, imoralidade e violência; e muda nossa história, que não precisa mais ser trágica como a de Sansão, mas vitoriosa e consagrada a Deus.', 'devocional', 'sansao.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(72) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateCa` datetime DEFAULT NULL,
  `dateUp` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `online` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idUser`, `name`, `login`, `pass`, `dateCa`, `dateUp`, `active`, `online`) VALUES
(1, 'Default', 'default', '$2y$10$Y5v.lSXZQW94bOJG9jrLCu7aMp53BKv9JmQnp6.MsleXD2yw9F/4i', '0001-01-01 00:00:00', '0001-00-00 00:00:01', 0, 0),
(2, 'Mateus Costa', 'mateus', '$2y$10$oUMD7CsMSUXqqHniyl93Q.bVSW3f.fHvJtGdqR8uYIneHQ1YWxMXy', '2017-09-29 21:47:33', '2017-11-14 12:49:45', 1, 0),
(3, 'Filipe Andrade', 'filipe', '$2y$10$kyTt1n7FSC0pG71CtakL8u1BjrAMiXR/StMnVhOrTCBajeNj.ZvoC', '2017-11-14 12:57:01', '2017-11-14 12:57:01', 1, 0),
(4, 'Rogério Tavares', 'rogerio', '$2y$10$BP63IQ7xMPg2M2tZisxIAek1I2Oh5Vjv5iIZ3PFG6i/x8D/a8qtZe', '2018-01-10 00:58:00', '2018-01-10 00:58:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ip_msgs`
--
ALTER TABLE `ip_msgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ip_msgs`
--
ALTER TABLE `ip_msgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;