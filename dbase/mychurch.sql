-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 09:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychurch`
--

-- --------------------------------------------------------

--
-- Table structure for table `bible`
--

CREATE TABLE `bible` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bible`
--

INSERT INTO `bible` (`id`, `content`) VALUES
(1, '<h3>Genesis 1</h3><p>[<strong>Genesis 1:1</strong>] In the beginning God created the heaven and the earth.</p><p>[<strong>2</strong>] And the earth was without form, and void; and darkness was upon the face of the deep. And the Spirit of God moved upon the face of the waters.</p><p>[<strong>3</strong>] And God said, Let there be light: and there was light.</p><p>[<strong>4</strong>] And God saw the light, that it was good: and God divided the light from the darkness.</p><p>[<strong>5</strong>] And God called the light Day, and the darkness he called Night. And the evening and the morning were the first day.</p><p>[<strong>6</strong>] And God said, Let there be a firmament in the midst of the waters, and let it divide the waters from the waters.</p><p>[<strong>7</strong>] And God made the firmament, and divided the waters which were under the firmament from the waters which were above the firmament: and it was so.</p><p>[<strong>8</strong>] And God called the firmament Heaven. And the evening and the morning were the second day.</p><p>[<strong>9</strong>] And God said, Let the waters under the heaven be gathered together unto one place, and let the dry land appear: and it was so.</p><p>[<strong>10</strong>] And God called the dry land Earth; and the gathering together of the waters called he Seas: and God saw that it was good.</p><p>[<strong>11</strong>] And God said, Let the earth bring forth grass, the herb yielding seed, and the fruit tree yielding fruit after his kind, whose seed is in itself, upon the earth: and it was so.</p><p>[<strong>12</strong>] And the earth brought forth grass, and herb yielding seed after his kind, and the tree yielding fruit, whose seed was in itself, after his kind: and God saw that it was good.</p><p>[<strong>13</strong>] And the evening and the morning were the third day.</p><p>[<strong>14</strong>] And God said, Let there be lights in the firmament of the heaven to divide the day from the night; and let them be for signs, and for seasons, and for days, and years:</p><p>[<strong>15</strong>] And let them be for lights in the firmament of the heaven to give light upon the earth: and it was so.</p><p>[<strong>16</strong>] And God made two great lights; the greater light to rule the day, and the lesser light to rule the night: he made the stars also.</p><p>[<strong>17</strong>] And God set them in the firmament of the heaven to give light upon the earth,</p><p>[<strong>18</strong>] And to rule over the day and over the night, and to divide the light from the darkness: and God saw that it was good.</p><p>[<strong>19</strong>] And the evening and the morning were the fourth day.</p><p>[<strong>20</strong>] And God said, Let the waters bring forth abundantly the moving creature that hath life, and fowl that may fly above the earth in the open firmament of heaven.</p><p>[<strong>21</strong>] And God created great whales, and every living creature that moveth, which the waters brought forth abundantly, after their kind, and every winged fowl after his kind: and God saw that it was good.</p><p>[<strong>22</strong>] And God blessed them, saying, Be fruitful, and multiply, and fill the waters in the seas, and let fowl multiply in the earth.</p><p>[<strong>23</strong>] And the evening and the morning were the fifth day.</p><p>[<strong>24</strong>] And God said, Let the earth bring forth the living creature after his kind, cattle, and creeping thing, and beast of the earth after his kind: and it was so.</p><p>[<strong>25</strong>] And God made the beast of the earth after his kind, and cattle after their kind, and every thing that creepeth upon the earth after his kind: and God saw that it was good.</p><p>[<strong>26</strong>] And God said, Let us make man in our image, after our likeness: and let them have dominion over the fish of the sea, and over the fowl of the air, and over the cattle, and over all the earth, and over every creeping thing that creepeth upon the earth.</p><p>[<strong>27</strong>] So God created man in his own image, in the image of God created he him; male and female created he them.</p><p>[<strong>28</strong>] And God blessed them, and God said unto them, Be fruitful, and multiply, and replenish the earth, and subdue it: and have dominion over the fish of the sea, and over the fowl of the air, and over every living thing that moveth upon the earth.</p><p>[<strong>29</strong>] And God said, Behold, I have given you every herb bearing seed, which is upon the face of all the earth, and every tree, in the which is the fruit of a tree yielding seed; to you it shall be for meat.</p><p>[<strong>30</strong>] And to every beast of the earth, and to every fowl of the air, and to every thing that creepeth upon the earth, wherein there is life, I have given every green herb for meat: and it was so.</p><p>[<strong>31</strong>] And God saw every thing that he had made, and, behold, it was very good. And the evening and the morning were the sixth day.</p>'),
(2, '<h3>Genesis 2:</h3><p><strong>Gen 2:1</strong> Thus the heavens and the earth were finished, and all the host of them.</p><p>[<strong>2</strong>] And on the seventh day God ended his work which he had made; and he rested on the seventh day from all his work which he had made.</p><p>[<strong>3</strong>] And God blessed the seventh day, and sanctified it: because that in it he had rested from all his work which God created and made.</p><p>[<strong>4</strong>] These are the generations of the heavens and of the earth when they were created, in the day that the LORD God made the earth and the heavens,</p><p>[<strong>5</strong>] And every plant of the field before it was in the earth, and every herb of the field before it grew: for the LORD God had not caused it to rain upon the earth, and there was not a man to till the ground.</p><p>[<strong>6</strong>] But there went up a mist from the earth, and watered the whole face of the ground.</p><p>[<strong>7</strong>] And the LORD God formed man of the dust of the ground, and breathed into his nostrils the breath of life; and man became a living soul.</p><p>[<strong>8</strong>] And the LORD God planted a garden eastward in Eden; and there he put the man whom he had formed.</p><p>[<strong>9</strong>] And out of the ground made the LORD God to grow every tree that is pleasant to the sight, and good for food; the tree of life also in the midst of the garden, and the tree of knowledge of good and evil.</p><p>[<strong>10</strong>] And a river went out of Eden to water the garden; and from thence it was parted, and became into four heads.</p><p>[<strong>11</strong>] The name of the first is Pison: that is it which compasseth the whole land of Havilah, where there is gold;</p><p>[<strong>12</strong>] And the gold of that land is good: there is bdellium and the onyx stone.</p><p>[<strong>13</strong>] And the name of the second river is Gihon: the same is it that compasseth the whole land of Ethiopia.</p><p>[<strong>14</strong>] And the name of the third river is Hiddekel: that is it which goeth toward the east of Assyria. And the fourth river is Euphrates.</p><p>[<strong>15</strong>] And the LORD God took the man, and put him into the garden of Eden to dress it and to keep it.</p><p>[<strong>16</strong>] And the LORD God commanded the man, saying, Of every tree of the garden thou mayest freely eat:</p><p>[<strong>17</strong>] But of the tree of the knowledge of good and evil, thou shalt not eat of it: for in the day that thou eatest thereof thou shalt surely die.</p><p>[<strong>18</strong>] And the LORD God said, It is not good that the man should be alone; I will make him an help meet for him.</p><p>[<strong>19</strong>] And out of the ground the LORD God formed every beast of the field, and every fowl of the air; and brought them unto Adam to see what he would call them: and whatsoever Adam called every living creature, that was the name thereof.</p><p>[<strong>20</strong>] And Adam gave names to all cattle, and to the fowl of the air, and to every beast of the field; but for Adam there was not found an help meet for him.</p><p>[<strong>21</strong>] And the LORD God caused a deep sleep to fall upon Adam and he slept: and he took one of his ribs, and closed up the flesh instead thereof;</p><p>[<strong>22</strong>] And the rib, which the LORD God had taken from man, made he a woman, and brought her unto the man.</p><p>[<strong>23</strong>] And Adam said, This is now bone of my bones, and flesh of my flesh: she shall be called Woman, because she was taken out of Man.</p><p>[<strong>24</strong>] Therefore shall a man leave his father and his mother, and shall cleave unto his wife: and they shall be one flesh.</p><p>[<strong>25</strong>] And they were both naked, the man and his wife, and were not ashamed.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `hymns`
--

CREATE TABLE `hymns` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `hymn` text NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hymns`
--

INSERT INTO `hymns` (`id`, `title`, `hymn`, `category`) VALUES
(1, 'Hymn 1', '<p>&nbsp; &nbsp; &nbsp; <i>Great Shepherd of thy people, hear;</i></p><p><i>&nbsp; &nbsp; &nbsp; thy presence now display;</i></p><p><i>&nbsp; &nbsp; &nbsp; as thou hast given a place for prayer,</i></p><p><i>&nbsp; &nbsp; &nbsp; so give us hearts to pray.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Shoe us some token of thy love</i></p><p><i>&nbsp; &nbsp; &nbsp; Our fainting hope to raise,</i></p><p><i>&nbsp; &nbsp; &nbsp; And pour thy blessing from above</i></p><p><i>&nbsp; &nbsp; &nbsp; That we may render praise,</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Within these walls let holy peace</i></p><p><i>&nbsp; &nbsp; &nbsp; and love and concord dwell;</i></p><p><i>&nbsp; &nbsp; &nbsp; here give the troubled conscience ease;</i></p><p><i>&nbsp; &nbsp; &nbsp; the wounded spirit heal.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; The hearing ear, the seeing eye,</i></p><p><i>&nbsp; &nbsp; &nbsp; the contrite heart bestow;</i></p><p><i>&nbsp; &nbsp; &nbsp; and shine upon us from on high,</i></p><p><i>&nbsp; &nbsp; &nbsp; that we in grace may grow.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; May we in faith receive thy Word,</i></p><p><i>&nbsp; &nbsp; &nbsp; in faith address our prayers;</i></p><p><i>&nbsp; &nbsp; &nbsp; and in the presence of the Lord</i></p><p><i>&nbsp; &nbsp; &nbsp; unburden all our cares.</i></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amen</p>', 'english'),
(2, 'Hymn 2      ', '<p>&nbsp; &nbsp; &nbsp; Remember me, O Lord, with Thy favour.</p><p>&nbsp; &nbsp; &nbsp; Ps. 106:4</p><p>&nbsp; &nbsp; &nbsp; <i>Love divine, all loves excelling,</i></p><p><i>&nbsp; &nbsp; &nbsp; Joy of heaven to earth come down;</i></p><p><i>&nbsp; &nbsp; &nbsp; Fix in us thy humble dwelling;</i></p><p><i>&nbsp; &nbsp; &nbsp; All thy faithful mercies crown!</i></p><p><i>&nbsp; &nbsp; &nbsp; Jesus, Thou art all compassion,</i></p><p><i>&nbsp; &nbsp; &nbsp; Pure unbounded love Thou art;</i></p><p><i>&nbsp; &nbsp; &nbsp; Visit us with Thy salvation;</i></p><p><i>&nbsp; &nbsp; &nbsp; Enter every trembling heart.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Come, Almighty to deliver,</i></p><p><i>&nbsp; &nbsp; &nbsp; Let us all Thy life receive;</i></p><p><i>&nbsp; &nbsp; &nbsp; Suddenly return and never,</i></p><p><i>&nbsp; &nbsp; &nbsp; Never more Thy temples leave.</i></p><p><i>&nbsp; &nbsp; &nbsp; Thee we would be always blessing,</i></p><p><i>&nbsp; &nbsp; &nbsp; Serve Thee as Thy hosts above,</i></p><p><i>&nbsp; &nbsp; &nbsp; Pray and praise Thee without ceasing,</i></p><p><i>&nbsp; &nbsp; &nbsp; Glory in Thy perfect love.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Finish, then, Thy new creation;</i></p><p><i>&nbsp; &nbsp; &nbsp; Pure and spotless let us be.</i></p><p><i>&nbsp; &nbsp; &nbsp; Let us see Thy great salvation</i></p><p><i>&nbsp; &nbsp; &nbsp; Perfectly restored in Thee;</i></p><p><i>&nbsp; &nbsp; &nbsp; Changed from glory into glory,</i></p><p><i>&nbsp; &nbsp; &nbsp; Till in heaven we take our place,</i></p><p><i>&nbsp; &nbsp; &nbsp; Till we cast our crowns before Thee,</i></p><p><i>&nbsp; &nbsp; &nbsp; Lost in wonder, love, and praise.</i></p><p>&nbsp; &nbsp; &nbsp; Amen</p>', 'english'),
(3, 'Hymn 3', '<p>&nbsp; &nbsp; Awake Psaltery and harp, I myself will awake early &nbsp;Ps 10 &nbsp; &nbsp; &nbsp; &nbsp;8:2&nbsp;<br><br>&nbsp; &nbsp; &nbsp;Awake, my soul, and with the sun&nbsp;<br>&nbsp; &nbsp; &nbsp;Thy daily stage of duty run;&nbsp;<br>&nbsp; &nbsp; &nbsp;Shake off dull sloth, and joyful rise,&nbsp;<br>&nbsp; &nbsp; &nbsp;To pay thy morning sacrifice.&nbsp;<br><br>&nbsp; &nbsp; &nbsp;Thy precious time misspent, redeem,&nbsp;<br>&nbsp; &nbsp; &nbsp;Each present day thy last esteem,&nbsp;<br>&nbsp; &nbsp; &nbsp;Improve thy talent with due care;&nbsp;<br>&nbsp; &nbsp; &nbsp;For the great day thyself prepare.&nbsp;<br><br>&nbsp; &nbsp; &nbsp;Let all thy converse be since,&nbsp;<br>&nbsp; &nbsp; &nbsp;Thy conscience as the noontide clear,&nbsp;<br>&nbsp; &nbsp; &nbsp;Think how all seeing God thy ways&nbsp;<br>&nbsp; &nbsp; &nbsp;And all thy secret thoughts surveys.&nbsp;<br><br>&nbsp; &nbsp; &nbsp;By influence of the light Divine&nbsp;<br>&nbsp; &nbsp; &nbsp;Let thy own light to others shine;&nbsp;<br>&nbsp; &nbsp; &nbsp;Reflect all Heavâ€™nâ€™s propitious rays&nbsp;<br>&nbsp; &nbsp; &nbsp;In ardent love and cheerful praise&nbsp;<br><br>&nbsp; &nbsp; &nbsp;Wake, and lift up thyself, my heart&nbsp;<br>&nbsp; &nbsp; &nbsp;And with the angels bear thy part,&nbsp;<br>&nbsp; &nbsp; &nbsp;Who all night long unwearied sing&nbsp;<br>&nbsp; &nbsp; &nbsp;High praise to the eternal King.&nbsp;<br><br>&nbsp; &nbsp; &nbsp;I wake, I wake, ye heavâ€™nly choir,&nbsp;<br>&nbsp; &nbsp; &nbsp;May your devotion me inspire,&nbsp;<br>&nbsp; &nbsp; &nbsp;That I, like you, my age may spend,&nbsp;<br>&nbsp; &nbsp; &nbsp;Like you may on my God attend.&nbsp;<br>&nbsp; &nbsp; &nbsp;Amen &nbsp;<br>&nbsp;</p>', 'english'),
(4, 'Hymn 4', '<p><i>&nbsp; &nbsp; &nbsp; Forth in Thy name O Lord I go</i></p><p><i>&nbsp; &nbsp; &nbsp; Forth in Thy name, O Lord I go,</i></p><p><i>&nbsp; &nbsp; &nbsp; My daily labour to pursue,</i></p><p><i>&nbsp; &nbsp; &nbsp; Thee, only Thee, resolved to know</i></p><p><i>&nbsp; &nbsp; &nbsp; In all I think, or speak, or do.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; The task Thy wisdom hath assigned</i></p><p><i>&nbsp; &nbsp; &nbsp; O let me cheerfully fulfil,</i></p><p><i>&nbsp; &nbsp; &nbsp; In all my works Thy presence find,</i></p><p><i>&nbsp; &nbsp; &nbsp; And prove Thy acceptable will.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Preserve me from my callingâ€™s snare,</i></p><p><i>&nbsp; &nbsp; &nbsp; And hide my sample heart above,</i></p><p><i>&nbsp; &nbsp; &nbsp; Above the thorns of choking care</i></p><p><i>&nbsp; &nbsp; &nbsp; He gilded baits of worldly love.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Thee may I set at my right hand,</i></p><p><i>&nbsp; &nbsp; &nbsp; Whose eyes my inmost substance see,</i></p><p><i>&nbsp; &nbsp; &nbsp; And labour on at Thy command,</i></p><p><i>&nbsp; &nbsp; &nbsp; And offer all my works to Thee.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Give me to bear Thy easy yoke,</i></p><p><i>&nbsp; &nbsp; &nbsp; And every moment watch and pray,</i></p><p><i>&nbsp; &nbsp; &nbsp; And still to things eternal look,</i></p><p><i>&nbsp; &nbsp; &nbsp; And hasten to Thy glorious day,</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; For Thee delightfully employ</i></p><p><i>&nbsp; &nbsp; &nbsp; Whateâ€™er Thy bounteous grace hath givâ€™n,</i></p><p><i>&nbsp; &nbsp; &nbsp; And run my course with even joy,</i></p><p><i>&nbsp; &nbsp; &nbsp; And closely walk with Thee to heaven</i>.</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amen</p>', 'english'),
(5, 'Hymn 5', '<p><i>&nbsp; &nbsp; &nbsp; Come to me.&nbsp; Lord, when first I wake.</i></p><p><i>&nbsp; &nbsp; &nbsp; As the faint lights of morning break;</i></p><p><i>&nbsp; &nbsp; &nbsp; Bid purest thoughts within me rise,</i></p><p><i>&nbsp; &nbsp; &nbsp; Like crystal dew-drops to the skies.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Come to me in the sultry noon.</i></p><p><i>&nbsp; &nbsp; &nbsp; Or earthâ€™s low communing will soon</i></p><p><i>&nbsp; &nbsp; &nbsp; Of thy dear face, eclipse the light,</i></p><p><i>&nbsp; &nbsp; &nbsp; And change my fairest day to night.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Come to me in the evening shade,</i></p><p><i>&nbsp; &nbsp; &nbsp; And if my heart from thee</i></p><p><i>&nbsp; &nbsp; &nbsp; Hath-strayed.</i></p><p><i>&nbsp; &nbsp; &nbsp; Oh bring it back, and from afar</i></p><p><i>&nbsp; &nbsp; &nbsp; Smile on me like thine evâ€™ning star.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Come to me in the midnight hour,</i></p><p><i>&nbsp; &nbsp; &nbsp; When sleep withholds its balmy powâ€™r;</i></p><p><i>&nbsp; &nbsp; &nbsp; Let my lone spirit find her rest,</i></p><p><i>&nbsp; &nbsp; &nbsp; Like John, upon my Saviourâ€™s breast.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Come to me through lifeâ€™s varied way,</i></p><p><i>&nbsp; &nbsp; &nbsp; And when its pulses ceases to play.</i></p><p><i>&nbsp; &nbsp; &nbsp; Then, Saviour, bid me come to thee,</i></p><p><i>&nbsp; &nbsp; &nbsp; That where thou art, thy child may be.</i></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amen</p>', 'english'),
(6, 'Hymn 6', '<p><i>&nbsp; &nbsp; &nbsp; Christ, whose glory fills the skies,</i></p><p><i>&nbsp; &nbsp; &nbsp; Christ, the true, the only light,</i></p><p><i>&nbsp; &nbsp; &nbsp; Sun of Righteousness, arise,</i></p><p><i>&nbsp; &nbsp; &nbsp; Triumph o\'er the shades of night;</i></p><p><i>&nbsp; &nbsp; &nbsp; Dayspring from on high, be near;</i></p><p><i>&nbsp; &nbsp; &nbsp; Daystar, in my heart appear.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Dark and cheerless is the morn</i></p><p><i>&nbsp; &nbsp; &nbsp; Unaccompanied by thee;</i></p><p><i>&nbsp; &nbsp; &nbsp; Joyless is the day\'s return,</i></p><p><i>&nbsp; &nbsp; &nbsp; Till thy mercy\'s beams I see;</i></p><p><i>&nbsp; &nbsp; &nbsp; Till they inward light impart,</i></p><p><i>&nbsp; &nbsp; &nbsp; Cheer my eyes and warm my heart.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Visit then this soul of mine;</i></p><p><i>&nbsp; &nbsp; &nbsp; Pierce the gloom of sin and grief;</i></p><p><i>&nbsp; &nbsp; &nbsp; Fill me, Radiancy divine,</i></p><p><i>&nbsp; &nbsp; &nbsp; Scatter all my unbelief;</i></p><p><i>&nbsp; &nbsp; &nbsp; More and more thyself display,</i></p><p><i>&nbsp; &nbsp; &nbsp; Shining to the perfect day.</i></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amen</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', 'english'),
(7, 'Hymn 7', '<p><i>&nbsp; &nbsp; &nbsp; Come to the morning prayâ€™r,</i></p><p><i>&nbsp; &nbsp; &nbsp; Come, let us kneel and pray;</i></p><p><i>&nbsp; &nbsp; &nbsp; Prayâ€™r is the Christian pilgrimâ€™s staff</i></p><p><i>&nbsp; &nbsp; &nbsp; To walk with God all day.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp;&nbsp; &nbsp;At noon beneath the rock</i></p><p><i>&nbsp; &nbsp; &nbsp; Of ages rest and pray;</i></p><p><i>&nbsp; &nbsp; &nbsp; Sweet is the shadow from the heat,</i></p><p><i>&nbsp; &nbsp; &nbsp; When the sun smites by the day</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; At eve shut to the door,</i></p><p><i>&nbsp; &nbsp; &nbsp; Round the home-altar pray,</i></p><p><i>&nbsp; &nbsp; &nbsp; And finding there the house of God,</i></p><p><i>&nbsp; &nbsp; &nbsp; At heavâ€™n gate close the day.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; When mid-night seals our eyes,</i></p><p><i>&nbsp; &nbsp; &nbsp; Let each in spirit say,</i></p><p><i>&nbsp; &nbsp; &nbsp; I sleep, but my heart waketh, Lord,</i></p><p><i>&nbsp; &nbsp; &nbsp; With thee to watch and pray.</i></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amen</p>', 'english'),
(8, 'Hymn 8', '<p><i>He shall cover thee with His feathers â€“ Ps 91:4</i></p><p><i>The Morning brights with rosy light</i></p><p><i>Has waked me from my sleep</i></p><p><i>Father, I won Thy love laone</i></p><p><i>Thy little one doth keep</i></p><p>&nbsp;</p><p><i>All through the day, I humbly pray</i></p><p><i>Be Thou my guard and guide</i></p><p><i>My sins forgive, and let me live,</i></p><p><i>Lord Jesus, near Thy side</i></p><p>&nbsp;</p><p><i>Oh make Thy rest within my breast,</i></p><p><i>Great Spirit of all grace&nbsp;</i></p><p><i>Make me like Thee, then shall I be</i></p><p><i>Prepared to see Thy face</i></p><p>Amen</p>', 'english'),
(9, 'Hymn 9', '<p>Jesus, Sun of righteousness,&nbsp;<br>Brightness beam of live divine&nbsp;<br>With the early morning rays&nbsp;<br>Do Thou on our darkness shine,&nbsp;<br>And dispel with purest light&nbsp;<br>All our night&nbsp;<br><br>As on drooping herb and flowâ€™r&nbsp;<br>Falls the soft refreshing dew,&nbsp;<br>Let Thy Spiritâ€™s grace and powâ€™r&nbsp;<br>All our weary souls renew;&nbsp;<br>Showâ€™rs of blessing over all&nbsp;<br>Softly fall&nbsp;<br><br>Like the sunâ€™s reviving ray,&nbsp;<br>May Thy love with tender glow&nbsp;<br>All our coldness melt away,&nbsp;<br>Warm &nbsp;and cheer us forth to go,&nbsp;<br>Gladly sere Thee and obey&nbsp;<br>All the day&nbsp;<br><br>Oh, our only Hope and Guide&nbsp;<br>Never leave us nor forsake;&nbsp;<br>Keep us ever at Thy side&nbsp;<br>Till thâ€™eternal morning break&nbsp;<br>Moving on to Zionâ€™s hill,&nbsp;<br>Homeward still&nbsp;<br><br>Lead us all our days and years&nbsp;<br>In Thy straight and narrow way;&nbsp;<br>Lead us through the vale of tears&nbsp;<br>To the land of perfect day;&nbsp;<br>Where Thy people, fully blest,&nbsp;<br>Safely rest.&nbsp;<br>Amen&nbsp;<br>&nbsp;</p>', 'english'),
(10, 'Hymn 10', '<p><i>&nbsp; &nbsp; &nbsp; Holy Father, hear me;</i></p><p><i>&nbsp; &nbsp; &nbsp; Thou art my defender;</i></p><p><i>&nbsp; &nbsp; &nbsp; Be thou ever near me,</i></p><p><i>&nbsp; &nbsp; &nbsp; Loving, true, and tender.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Jesus, blessed master.</i></p><p><i>&nbsp; &nbsp; &nbsp; Lord of life and glory</i></p><p><i>&nbsp; &nbsp; &nbsp; Bid the hours fly faster,</i></p><p><i>&nbsp; &nbsp; &nbsp; Till i kneel before thee.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Comforter denignest,</i></p><p><i>&nbsp; &nbsp; &nbsp; Who abiding in me</i></p><p><i>&nbsp; &nbsp; &nbsp; All my need divinest,</i></p><p><i>&nbsp; &nbsp; &nbsp; Move me, draw me, win me.</i></p><p>&nbsp;</p><p><i>&nbsp; &nbsp; &nbsp; Holy, Holy,Holy,</i></p><p><i>&nbsp; &nbsp; &nbsp; Come and leave me never,</i></p><p><i>&nbsp; &nbsp; &nbsp; Thine abode most lowly,</i></p><p><i>&nbsp; &nbsp; &nbsp; Only Thine for ever.</i></p><p>&nbsp; &nbsp; &nbsp; Amen</p>', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phone1` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addres` varchar(50) NOT NULL,
  `htown` varchar(50) NOT NULL,
  `maritalstatus` varchar(50) NOT NULL,
  `spouse` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `baptised` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `family` varchar(50) NOT NULL,
  `fellowship1` varchar(50) NOT NULL,
  `fellowship2` varchar(50) NOT NULL,
  `emergname` varchar(50) NOT NULL,
  `emergcontact` varchar(50) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `title`, `fname`, `mname`, `lname`, `gender`, `dob`, `phone1`, `phone2`, `email`, `addres`, `htown`, `maritalstatus`, `spouse`, `occupation`, `baptised`, `branch`, `family`, `fellowship1`, `fellowship2`, `emergname`, `emergcontact`, `img`) VALUES
(1, 'Mr', 'Alex Kwaku', 'Ayensu', 'Darpah', 'Male', '1985-06-26', '0242222874', '', 'rasdarps@yahoo.com', 'P O Box ks 4508 Adum Kumasi\r\nPlot 7 Blk A Santasi ', 'Kumasi', 'Male', 'Freda Amponsah Darpah', 'IT Consultant', 'No', 'Central', 'Peace', 'Youth Fellowship', 'Men Fellowship', 'Clinton Darpah', '0549155945', '610101565792008.png'),
(2, 'Mr', 'James', '', 'Adawuah', 'Male', '1989-08-26', '0502415465', '', 'james@yahoo.com', 'A 45 /2 nkwanta', 'Dwomo', 'Female', '', 'Teacher', 'Yes', 'number Two', 'Hope', 'Youth', '', 'Adwoa', '0549155945', '8605721565960172.png'),
(3, 'Mr', 'kwaku', 'Manu', 'Ansah', 'Male', '1990-02-22', '123456789', '', 'me2@gmail.com', 'A 82/2 Duayaw Nkwanta', 'Mampong', 'Male', 'Freda', 'IT Consultant', 'Yes', 'Central', 'Peace', 'Youth Fellowship', 'Men Fellowship', 'freda Adwoa', '0549155945', '6987121565973104.png'),
(4, 'Mr', 'Samuel', '', 'Gyamfi', 'Male', '1992-08-24', '0242348410', '0242348410', 'gyamfis2@gmail.com', 'Box 62-duayaw-nkwanta', 'duayaw-nkwanta', 'Female', '', 'teaching', 'No', '58', 'Love', 'Youth Fellowship', 'Men Fellowship', 'ideas', '0242348410', '8257271566049616.jpg'),
(5, 'Mr', 'Samuel', 'Kofi', 'Mensah', 'Male', '1980-09-12', '0247689452', '', 'kofi@yahoo.com', 'P O Box 45 Kaase, Kumasi.', 'Koforidua', 'Single', '', 'Business Man', 'No', 'Central', 'Faith', 'Men Fellowship', 'Youth Fellowship', 'Mr Addo', '123456', '6756341566481416.jpg'),
(6, 'Rev', 'Michael', 'Owusu', 'Ansah', 'Male', '1985-02-22', '025648956', '', 'ansah@yahoo.com', 'P O Box 32 Accra North', 'Kotei', 'Single', '', 'Manager', 'No', 'Central', 'Hope', 'Men Fellowship', 'Men Fellowship', 'Afro Moses', '1234567', '126411566481939.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `msg_date` date NOT NULL,
  `msg_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `fullname`, `contact`, `email`, `content`, `msg_date`, `msg_time`) VALUES
(1, 'Alex Kwaku Ayensu Darpah', '', 'rasdarps@gmail.com', 'Test', '0000-00-00', '00:00:00'),
(2, 'hhh', '', 'g@email.com', 'fffgggg', '0000-00-00', '00:00:00'),
(3, 'Alex', '', 'ansah@yahoo.com', 'Test try 2', '2019-05-25', '10:42:54'),
(4, 'Frefre', 'aaa', 'fre@yahoo.com', 'whats up', '2019-05-25', '09:13:09'),
(5, 'aaa', '0242222875', 'ras@yahoo.com', 'terttt', '2019-06-22', '05:49:52');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `posttitle` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `postdate` date NOT NULL,
  `post` text NOT NULL,
  `img` text NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `posttitle`, `category`, `postdate`, `post`, `img`, `username`) VALUES
(2, 'Youth Camping', 'Youth Fellowship', '2019-08-19', '<p>What is lorem ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n</p>', '5419101566181603.jpg', 'demo'),
(3, 'Funeral Announcement', 'Funeral', '2019-08-19', '<p><strong>What is lorem ipsum?</strong></p><p><i>Lorem Ipsum</i>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><strong>Why do we use it?</strong></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '5401661566184922.jpg', 'demo'),
(4, 'Tarry Camp Program', 'General', '2019-08-21', '<p>From 25th of August 2019 to 1st September 2019 there will tarry camp program.</p>', '7994421566404849.jpg', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `pass` text NOT NULL,
  `img` text NOT NULL,
  `user_role` enum('sa','member','secretary') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `dob`, `pass`, `img`, `user_role`) VALUES
(1, 'admin', 'Kwaku Darpah', 'ctn@gmail.com', '2019-07-29', 'e10adc3949ba59abbe56e057f20f883e', '1202281564399680.png', 'sa'),
(2, 'member', 'James Adawuah', 'jam@yahoo.com', '1989-06-26', 'e10adc3949ba59abbe56e057f20f883e', '1202281564399680.png', 'member'),
(4, 'secretary', 'Secretary', 'guest@gmail.com', '1990-02-22', 'e10adc3949ba59abbe56e057f20f883e', '1202281564399680.png', 'secretary');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `home_count` int(11) NOT NULL,
  `dash_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`home_count`, `dash_count`) VALUES
(45, 36);

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE `welfare` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `paydate` date NOT NULL,
  `amount` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `welfare`
--

INSERT INTO `welfare` (`id`, `member_id`, `paydate`, `amount`) VALUES
(1, 1, '2019-08-04', 1),
(2, 2, '2019-08-04', 1),
(3, 1, '2019-08-11', 1),
(4, 2, '2019-08-11', 1),
(5, 1, '2019-08-18', 1),
(6, 1, '2019-08-21', 5),
(7, 1, '2019-08-22', 10),
(8, 2, '2019-08-28', 10),
(9, 1, '2019-08-28', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bible`
--
ALTER TABLE `bible`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hymns`
--
ALTER TABLE `hymns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welfare`
--
ALTER TABLE `welfare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bible`
--
ALTER TABLE `bible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hymns`
--
ALTER TABLE `hymns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `welfare`
--
ALTER TABLE `welfare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `welfare`
--
ALTER TABLE `welfare`
  ADD CONSTRAINT `welfare_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
