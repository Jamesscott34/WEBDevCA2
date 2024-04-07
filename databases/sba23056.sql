
CREATE DATABASE sba23056;

use sba23056;



CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

-- Table structure for table `movies`
CREATE TABLE `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(255) DEFAULT NULL,
  `release_year` int DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `actors` varchar(255) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `description` text,
  `cinema` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `trailer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `moviessaved` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);

-- Table structure for table `moviesviewed`
CREATE TABLE `moviesviewed` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
-- Insert sample data into the `users` table
INSERT INTO `users` (`username`, `password`, `email`, `created_at`)
VALUES 
('john_doe', 'password123', 'john@example.com', NOW()),
('jane_smith', 'securepass', 'jane@example.com', NOW()),
('alex_brown', '12345678', 'alex@example.com', NOW()),
('emma_jones', 'password123', 'emma@example.com', NOW()),
('mike_wilson', 'pass1234', 'mike@example.com', NOW()),
('sarah_clark', 'password', 'sarah@example.com', NOW()),
('chris_evans', 'test123', 'chris@example.com', NOW()),
('laura_taylor', 'password321', 'laura@example.com', NOW()),
('kevin_miller', 'qwerty', 'kevin@example.com', NOW()),
('amy_adams', 'password', 'amy@example.com', NOW());


INSERT INTO `movies` (`movie_name`, `release_year`, `genre`, `actors`, `duration`, `description`, `cinema`, `image`, `trailer`)
VALUES 
("The Godfather", 1972, "Crime, Drama", "Marlon Brando, Al Pacino, James Caan", 57, "The Godfather is a classic crime drama film directed by Francis Ford Coppola. Set in the late 1940s, the story revolves around the powerful Italian-American crime family of Don Vito Corleone, played by Marlon Brando. As his youngest son Michael, portrayed by Al Pacino, reluctantly gets involved in the family business, tensions rise within the Corleone clan. The film delves deep into themes of loyalty, power, and betrayal as the Corleone family navigates the treacherous world of organized crime in post-war America. With stellar performances, gripping storytelling, and iconic scenes, The Godfather has cemented its place as one of the greatest films of all time.", "Tallaght", "../images/movie_images/The_Godfather.jpg", "../trailers/the godfather.mp4"),
("Star Wars: Episode IV - A New Hope", 1977, "Action, Adventure, Fantasy", "Mark Hamill, Harrison Ford, Carrie Fisher", 3, "Star Wars: Episode IV - A New Hope is an epic space opera film directed by George Lucas. The story is set in a galaxy far, far away, where the evil Galactic Empire, led by Darth Vader, seeks to crush the Rebel Alliance and maintain its tyrannical grip on the galaxy. Enter Luke Skywalker, a young farm boy with dreams of adventure, Han Solo, a roguish smuggler, and Princess Leia, a fearless leader of the Rebellion. Together, they embark on a daring mission to rescue Princess Leia, destroy the Empire's ultimate weapon - the Death Star, and restore peace to the galaxy. Filled with iconic characters, thrilling action sequences, and groundbreaking special effects, A New Hope launched one of the most beloved franchises in cinematic history.", "Clondalkin", "../images/movie_images/Star_Wars__Episode_IV_-_A_New_Hope_.jpg", "../trailers/star wars 4.mp4"),
("Raiders of the Lost Ark", 1981, "Action, Adventure", "Harrison Ford, Karen Allen, Paul Freeman", 56, "Raiders of the Lost Ark is a thrilling adventure film directed by Steven Spielberg. Set in the 1930s, the story follows the intrepid archaeologist Indiana Jones as he races against Nazi agents in a quest to find the biblical Ark of the Covenant. Along the way, Indy, played by Harrison Ford, encounters deadly traps, ancient mysteries, and rival archaeologists, including the spirited Marion Ravenwood, portrayed by Karen Allen. With its pulse-pounding action sequences, dazzling special effects, and unforgettable characters, Raiders of the Lost Ark has captivated audiences for decades and remains a timeless classic in the adventure genre.", "Blanchardstown", "../images/movie_images/Raiders_of_the_Lost_Ark_.jpg", "../trailers/raiders of the lost ark.mp4"),
("E.T. the Extra-Terrestrial", 1982, "Family, Science Fiction", "Henry Thomas, Drew Barrymore, Dee Wallace", 56, "E.T. the Extra-Terrestrial is a heartwarming family adventure directed by Steven Spielberg.
When a gentle alien botanist becomes stranded on Earth, he befriends a young boy named Elliott, portrayed by Henry Thomas.
As Elliott and his siblings help E.T. evade government agents and reunite with his home planet, they embark on an unforgettable journey of friendship, courage, and wonder.
With its touching story, groundbreaking special effects, and iconic score, E.T. has captured the hearts of audiences around the world for generations.", "Blanchardstown", "../images/movie_images/E.T._.jpg", "../trailers/ET.mp4"),
("Blade Runner", 1982, "Sci-Fi, Thriller", "Harrison Ford, Rutger Hauer, Sean Young", 58, "Blade Runner is a neo-noir science fiction film directed by Ridley Scott.
Set in a dystopian future where genetically engineered replicants rebel against their human creators, the story follows Deckard, a retired blade runner played by Harrison Ford, tasked with hunting down rogue replicants.
As Deckard delves deeper into the case, he questions his own humanity and the nature of consciousness.
With its stunning visuals, thought-provoking themes, and gripping performances, Blade Runner has become a cult classic in the science fiction genre.", "Blanchardstown", "../images/movie_images/Blade_Runner.jpg", "../trailers/Blade Runner.mp4"),
("Back to the Future", 1985, "Adventure, Comedy, Sci-Fi", "Michael J. Fox, Christopher Lloyd, Lea Thompson", 57, "Back to the Future is a timeless adventure comedy directed by Robert Zemeckis.
When teenager Marty McFly, portrayed by Michael J. Fox, accidentally travels back in time to the 1950s in a plutonium-powered DeLorean time machine invented by his eccentric friend Doc Brown, played by Christopher Lloyd, he must ensure his parents fall in love to secure his existence.
As Marty navigates the quirks of the past while avoiding altering the future, he learns valuable lessons about love, friendship, and the consequences of time travel.
With its ingenious plot, memorable characters, and infectious charm, Back to the Future remains a beloved classic for audiences of all ages.", "City West", "../images/movie_images/Back_to_the_Future.jpg", "../trailers/Back to the future.mp4"),
("The Breakfast Club", 1985, "Comedy, Drama", "Emilio Estevez, Molly Ringwald, Judd Nelson", 38, "The Breakfast Club is a coming-of-age comedy-drama directed by John Hughes.
Set in a high school where five vastly different students from different social cliques � a brain, an athlete, a basket case, a princess, and a criminal � are forced to spend a Saturday detention together, the film explores the complexities of teenage identity, social pressure, and friendship.
As the day progresses, the students break down their walls and form unexpected connections, realizing they have more in common than they initially thought.
With its witty dialogue, relatable characters, and poignant themes, The Breakfast Club remains a timeless portrayal of adolescent angst and camaraderie.", "City West", "../images/movie_images/The_Breakfast_Club.jpg", "../trailers/Breakfast club.mp4"),
("Die Hard", 1988, "Action, Thriller", "Bruce Willis, Alan Rickman, Bonnie Bedelia", 14, "Die Hard is a groundbreaking action thriller directed by John McTiernan.
When New York City police officer John McClane, portrayed by Bruce Willis, visits his estranged wife at her workplace, the Nakatomi Plaza, for a Christmas party, the festivities are interrupted by a group of terrorists led by the charismatic Hans Gruber, played by Alan Rickman.
As McClane battles the terrorists alone, armed with only his wit and resourcefulness, he becomes the reluctant hero in a high-stakes game of cat and mouse.
With its iconic one-liners, pulse-pounding action sequences, and charismatic performances, Die Hard redefined the action genre and remains a perennial favorite among moviegoers.", "City West", "../images/movie_images/Die_Hard_.jpg", "../trailers/Die Hard.mp4"),
("Rain Man", 1988, "Drama", "Dustin Hoffman, Tom Cruise, Valeria Golino", 15, "Rain Man is a heartfelt drama directed by Barry Levinson.
When Charlie Babbitt, portrayed by Tom Cruise, learns that his estranged father has left his entire fortune to his autistic older brother, Raymond, played by Dustin Hoffman, Charlie embarks on a cross-country journey with Raymond to claim his inheritance.
As the two brothers reconnect and form a bond through their shared experiences, Charlie gains a deeper understanding of Raymond's unique perspective on the world.
With its powerful performances, poignant storytelling, and exploration of familial relationships, Rain Man has left a lasting impact on audiences worldwide.", "Blanchardstown", "../images/movie_images/Rain_Man.jpg", "../trailers/Rain MAn.mp4"),
("Indiana Jones and the Last Crusade", 1989, "Action, Adventure", "Harrison Ford, Sean Connery, Alison Doody", 9, "Indiana Jones and the Last Crusade is a thrilling action-adventure film directed by Steven Spielberg.
In this installment of the Indiana Jones series, renowned archaeologist and adventurer Indiana Jones, portrayed by Harrison Ford, embarks on a quest to find the Holy Grail, with the help of his estranged father, Professor Henry Jones, played by Sean Connery.
As they race against the Nazis to uncover the legendary artifact, Indiana Jones must confront his past and his relationship with his father while navigating treacherous obstacles and ancient mysteries.
With its exhilarating action sequences, witty humor, and dynamic performances, Indiana Jones and the Last Crusade is a timeless classic that continues to captivate audiences.", "City West", "../images/movie_images/Indiana_Jones_and_the_Last_Crusade.jpg", "../trailers/last crusade.mp4"),
("Goodfellas", 1990, "Biography, Crime, Drama", "Robert De Niro, Ray Liotta, Joe Pesci", 28, "Goodfellas is a gripping crime drama directed by Martin Scorsese.
Based on the true story of mobster-turned-informant Henry Hill, portrayed by Ray Liotta, the film follows Henry's rise through the ranks of the Italian-American mafia and his eventual downfall.
As Henry becomes increasingly involved in organized crime alongside his mentor Jimmy Conway, played by Robert De Niro, and the volatile Tommy DeVito, portrayed by Joe Pesci, he must navigate a dangerous world of violence, betrayal, and loyalty.
With its electrifying performances, stylish direction, and gritty realism, Goodfellas is widely regarded as one of the greatest films ever made.", "Clondalkin", "../images/movie_images/Goodfellas.jpg", "../trailers/the goodfellas.mp4"),
("The Silence of the Lambs", 1991, "Crime, Drama, Thriller", "Jodie Foster, Anthony Hopkins, Scott Glenn", 59, "The Silence of the Lambs is a chilling psychological thriller directed by Jonathan Demme.
FBI trainee Clarice Starling, portrayed by Jodie Foster, seeks the help of incarcerated serial killer Dr. Hannibal Lecter, played by Anthony Hopkins, to catch another serial killer known as Buffalo Bill.
As Clarice delves deeper into the twisted mind of Hannibal Lecter, she finds herself drawn into a deadly game of cat and mouse with Buffalo Bill.
With its haunting atmosphere, gripping performances, and iconic characters, The Silence of the Lambs is a masterclass in suspense and psychological horror.", "Clondalkin", "../images/movie_images/The_Silence_of_the_Lambs_.jpg", "../trailers/silence of the lambs.mp4"),
("Jurassic Park", 1993, "Adventure, Sci-Fi, Thriller", "Sam Neill, Laura Dern, Jeff Goldblum", 9, "Jurassic Park is a groundbreaking science fiction adventure directed by Steven Spielberg.
Based on the novel by Michael Crichton, the film follows a group of scientists and tourists who visit a remote island where an eccentric billionaire has created a theme park populated by genetically engineered dinosaurs.
As chaos erupts and the dinosaurs run amok, paleontologist Alan Grant, portrayed by Sam Neill, and paleobotanist Ellie Sattler, played by Laura Dern, must fight to survive alongside mathematician Ian Malcolm, portrayed by Jeff Goldblum.
With its groundbreaking visual effects, thrilling action sequences, and thought-provoking themes, Jurassic Park revolutionized the blockbuster genre and continues to awe audiences with its sense of wonder and adventure.", "Clondalkin", "../images/movie_images/Jurassic_Park_.jpg", "../trailers/jurrassicpark.mp4"),
("Pulp Fiction", 1994, "Crime, Drama", "John Travolta, Uma Thurman, Samuel L. Jackson", 36, "Pulp Fiction is a groundbreaking crime drama directed by Quentin Tarantino.
Set in Los Angeles, the film weaves together multiple interconnected stories involving mobsters, hitmen, and other colorful characters.
From the dance floors of a retro diner to the back rooms of seedy nightclubs, Pulp Fiction explores themes of redemption, violence, and the unexpected twists of fate.
With its nonlinear narrative, stylish dialogue, and memorable performances, Pulp Fiction has become a cultural phenomenon and a defining work of 1990s cinema.", "Clondalkin", "../images/movie_images/Pulp_Fiction.jpg", "../trailers/Pulp Fiction.mp4"),
("The Shawshank Redemption", 1994, "Drama", "Tim Robbins, Morgan Freeman, Bob Gunton", 24, "The Shawshank Redemption is a poignant drama directed by Frank Darabont.
Based on a Stephen King novella, the film follows the experiences of Andy Dufresne, a banker wrongfully convicted of murder and sentenced to life in Shawshank State Penitentiary.
As Andy navigates the harsh realities of prison life, he forms an unlikely friendship with fellow inmate Red, played by Morgan Freeman, and maintains hope for eventual freedom.
With its themes of hope, friendship, and the triumph of the human spirit, The Shawshank Redemption is celebrated as one of the greatest films of all time.", "Clondalkin", "../images/movie_images/The_Shawshank_Redemption_.jpg", "../trailers/shawshank redemption.mp4"),
("Toy Story", 1995, "Animation, Adventure, Comedy", "Tom Hanks, Tim Allen, Joan Cusack", 22, "Toy Story is a beloved animated film directed by John Lasseter.
Set in a world where toys come to life when humans are not around, the story follows the adventures of Woody, a pull-string cowboy doll, and Buzz Lightyear, a space ranger action figure, as they navigate the challenges of friendship, jealousy, and self-discovery.
With its groundbreaking computer animation, heartwarming story, and memorable characters, Toy Story captivated audiences of all ages and ushered in a new era of animated filmmaking.", "Blanchardstown", "../images/movie_images/Toy_story_.jpg", "../trailers/toy story 1.mp4"),
("Independence Day", 1996, "Action, Adventure, Sci-Fi", "Will Smith, Bill Pullman, Jeff Goldblum", 27, "Independence Day is an epic sci-fi action film directed by Roland Emmerich.
When aliens launch a coordinated attack on Earth's major cities, humanity must unite to fight back against the extraterrestrial invaders.
As the world teeters on the brink of annihilation, a disparate group of individuals, including a fighter pilot, a scientist, and the President of the United States, come together to mount a last-ditch effort to save humanity.
With its spectacular visual effects, pulse-pounding action sequences, and stirring patriotism, Independence Day is a thrilling cinematic experience.", "Tallaght", "../images/movie_images/Independence_Day.jpg", "../trailers/independance day.mp4"),
("Titanic", 1997, "Drama, Romance", "Leonardo DiCaprio, Kate Winslet, Billy Zane", 18, "Titanic is an epic romantic drama directed by James Cameron.
Set against the backdrop of the ill-fated maiden voyage of the RMS Titanic, the film follows the love story between Jack Dawson, a penniless artist, and Rose DeWitt Bukater, a young socialite.
As their romance blossoms onboard the luxurious ocean liner, they must navigate the class divides and societal expectations that threaten to keep them apart.
With its breathtaking visuals, sweeping score, and timeless love story, Titanic remains one of the highest-grossing and most beloved films of all time.", "Tallaght", "../images/movie_images/Titanic_.jpg", "../trailers/titanic.mp4"),
("Saving Private Ryan", 1998, "Action, Drama, War", "Tom Hanks, Matt Damon, Tom Sizemore", 51, "Saving Private Ryan is a harrowing war drama directed by Steven Spielberg.
Set during the D-Day invasion of Normandy in World War II, the film follows Captain John Miller, portrayed by Tom Hanks, and his squad as they embark on a dangerous mission to locate and bring home Private James Ryan, whose three brothers have been killed in action.
As they traverse war-torn Europe, they confront the brutal realities of combat and grapple with questions of duty, sacrifice, and the human cost of war.
With its visceral depiction of battle, stunning cinematography, and powerful performances, Saving Private Ryan is widely regarded as one of the greatest war films ever made.", "Tallaght", "../images/movie_images/Saving_Private_Ryan.jpg", "../trailers/saving private ryan.mp4"),
("The Matrix", 1999, "Action, Sci-Fi", "Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss", 18, "The Matrix is a groundbreaking sci-fi action film directed by The Wachowskis.
Set in a dystopian future where humanity is unknowingly trapped in a simulated reality, the film follows computer programmer Neo, portrayed by Keanu Reeves, as he discovers the truth about the Matrix and joins a rebellion against the machines that control it.
With its mind-bending visuals, innovative special effects, and thought-provoking themes of reality and identity, The Matrix revolutionized the science fiction genre and continues to captivate audiences with its visionary storytelling.", "Tallaght", "../images/movie_images/The_Matrix_.jpg", "../trailers/the matrix.mp4"),
("Gladiator", 2000, "Action, Adventure, Drama", "Russell Crowe, Joaquin Phoenix, Connie Nielsen", 37, "Gladiator is an epic historical drama directed by Ridley Scott.
Set in ancient Rome, the film follows the journey of Maximus Decimus Meridius, a loyal general betrayed by the corrupt Emperor Commodus, played by Joaquin Phoenix.
Forced into slavery and seeking revenge, Maximus rises through the ranks of gladiatorial combat to challenge the tyrannical rule of Commodus and restore honor to his fallen family.
With its grand scale, breathtaking action sequences, and powerful performances, Gladiator is a cinematic spectacle that continues to resonate with audiences around the world.", "Tallaght", "../images/movie_images/Gladiator_.jpg", "../trailers/gladiator.mp4"),
("The Lord of the Rings: The Fellowship of the Ring", 2001, "Action, Adventure, Fantasy", "Elijah Wood, Ian McKellen, Viggo Mortensen", 60, "The Lord of the Rings: The Fellowship of the Ring is an epic fantasy adventure directed by Peter Jackson.
Based on the beloved novel by J.R.R. Tolkien, the film follows young hobbit Frodo Baggins, portrayed by Elijah Wood, as he embarks on a perilous journey to destroy the One Ring and defeat the dark lord Sauron.
Joined by a fellowship of diverse allies, including the wise wizard Gandalf, played by Ian McKellen, and the brave ranger Aragorn, portrayed by Viggo Mortensen, Frodo must confront ancient evils and forge unlikely alliances to save Middle-earth from darkness.
With its breathtaking landscapes, intricate world-building, and timeless themes of friendship and heroism, The Lord of the Rings: The Fellowship of the Ring is a cinematic masterpiece that has captivated audiences for generations.", "Tallaght", "../images/movie_images/The_Lord_of_The_Rings__The_Fellowship_of_The_Ring_.jpg", "../trailers/lord of rings 1.mp4"),
("Spider-Man", 2002, "Action, Adventure, Sci-Fi", "Tobey Maguire, Kirsten Dunst, Willem Dafoe", 3, "Spider-Man is a thrilling superhero film directed by Sam Raimi.
Based on the Marvel Comics character, the film follows the origin story of Peter Parker, a high school student who gains spider-like abilities after being bitten by a radioactive spider.
As Peter grapples with his newfound powers and responsibilities, he must confront his own insecurities and face off against the villainous Green Goblin, portrayed by Willem Dafoe.
With its exhilarating action sequences, heartfelt storytelling, and iconic heroics, Spider-Man is a must-watch for fans of the web-slinger.", "Blanchardstown", "../images/movie_images/Spider-man_.jpg", "../trailers/spider man 1.mp4"),
("Pirates of the Caribbean: The Curse of the Black Pearl", 2003, "Action, Adventure, Fantasy", "Johnny Depp, Orlando Bloom, Keira Knightley", 25, "Pirates of the Caribbean: The Curse of the Black Pearl is a swashbuckling adventure directed by Gore Verbinski.
Set in the Caribbean during the Golden Age of Piracy, the film follows the eccentric pirate Captain Jack Sparrow, portrayed by Johnny Depp, as he teams up with blacksmith Will Turner, played by Orlando Bloom, and the spirited Elizabeth Swann, portrayed by Keira Knightley, to rescue Elizabeth from the clutches of the undead pirate Barbossa.
With its thrilling action sequences, witty humor, and memorable characters, Pirates of the Caribbean: The Curse of the Black Pearl is a rollicking good time that has spawned a beloved film franchise.", "Tallaght", "../images/movie_images/Pirates_of_the_Caribbean__The_Curse_of_the_Black_Pearl_.jpg", "../trailers/black pearl.mp4"),
("Eternal Sunshine of the Spotless Mind", 2004, "Drama, Romance, Sci-Fi", "Jim Carrey, Kate Winslet, Elijah Wood", 49, "Eternal Sunshine of the Spotless Mind is a mesmerizing romantic drama directed by Michel Gondry.
When Joel Barish, portrayed by Jim Carrey, discovers that his ex-girlfriend Clementine, played by Kate Winslet, has undergone a procedure to erase him from her memories, he decides to undergo the same procedure to forget her.
As Joel revisits his memories of Clementine, he realizes the depth of his feelings for her and embarks on a surreal journey through his subconscious.
With its inventive storytelling, poignant performances, and philosophical exploration of love and memory, Eternal Sunshine of the Spotless Mind is a thought-provoking masterpiece that lingers in the mind long after the credits roll.", "Tallaght", "../images/movie_images/Eternal_Sunshine_of_the_Spotless_Mind_.jpg", "../trailers/eternal sunshine.mp4"),
("The Dark Knight", 2008, "Action, Crime, Drama", "Christian Bale, Heath Ledger, Aaron Eckhart", 34, "The Dark Knight is a gripping action crime drama directed by Christopher Nolan.
Set in the fictional Gotham City, the film follows the legendary superhero Batman, portrayed by Christian Bale, as he faces his greatest challenge yet in the form of the anarchic and enigmatic Joker, played by Heath Ledger.
As Batman grapples with the moral complexities of justice and vigilantism, he must confront his own inner demons and make impossible choices to protect the city he loves.
With its intense performances, thrilling action sequences, and thought-provoking themes of chaos and order, The Dark Knight is a cinematic masterpiece that transcends the superhero genre.", "Clondalkin", "../images/movie_images/The_Dark_Knight_.jpg", "../trailers/the dark knight.mp4"),
("Avatar", 2009, "Action, Adventure, Fantasy", "Sam Worthington, Zoe Saldana, Sigourney Weaver", 44, "Avatar is an epic action adventure fantasy directed by James Cameron.
Set on the alien world of Pandora, the film follows Jake Sully, a paralyzed former marine portrayed by Sam Worthington, as he becomes embroiled in a conflict between the indigenous Na'vi people and the human colonizers exploiting their land.
As Jake navigates the lush and dangerous landscape of Pandora and forms a bond with the Na'vi, he must choose between loyalty to his own species and the call of a higher purpose.
With its groundbreaking visual effects, immersive world-building, and environmental themes, Avatar transports audiences to a breathtaking and unforgettable cinematic experience.", "Clondalkin", "../images/movie_images/Avatar.jpg", "../trailers/avatar1.mp4"),
("Up", 2009, "Animation, Adventure, Comedy", "Edward Asner, Jordan Nagai, Bob Peterson", 37, "Up is a heartwarming animated adventure comedy directed by Pete Docter.
The film follows the unlikely friendship between Carl Fredricksen, a grumpy elderly widower voiced by Edward Asner, and Russell, a young Wilderness Explorer scout voiced by Jordan Nagai, as they embark on a journey to South America in a flying house powered by helium balloons.
Along the way, they encounter exotic wildlife, perilous obstacles, and unexpected companions, including a talking dog named Dug.
With its poignant storytelling, colorful animation, and themes of friendship and resilience, Up is a timeless classic that appeals to audiences of all ages.", "Blanchardstown", "../images/movie_images/UP.jpg", "../trailers/up.mp4"),
("Inglourious Basterds", 2009, "Adventure, Drama, War", "Brad Pitt, M�lanie Laurent, Christoph Waltz", 35, "Inglourious Basterds is a thrilling adventure drama war film directed by Quentin Tarantino.
Set in Nazi-occupied France during World War II, the film follows a group of Jewish-American soldiers known as the 'Basterds' as they embark on a mission to assassinate high-ranking Nazi officials.
Led by the charismatic Lieutenant Aldo Raine, portrayed by Brad Pitt, and aided by a vengeful Jewish survivor named Shosanna Dreyfus, played by M�lanie Laurent, the Basterds engage in a game of cat-and-mouse with the ruthless Colonel Hans Landa, portrayed by Christoph Waltz.
With its trademark Tarantino dialogue, stylish visuals, and tension-filled storytelling, Inglourious Basterds is a cinematic tour de force that defies expectations and leaves a lasting impact on viewers.", "Clondalkin", "../images/movie_images/Inglourious_Basterds.jpg", "../trailers/inglorious bastards.mp4"),
("District 9", 2009, "Action, Sci-Fi, Thriller", "Sharlto Copley, Jason Cope, Nathalie Boltt", 53, "District 9 is a gripping action sci-fi thriller directed by Neill Blomkamp.
Set in a dystopian alternate reality where extraterrestrial refugees are confined to slum-like conditions in South Africa, the film follows Wikus van de Merwe, a hapless bureaucrat portrayed by Sharlto Copley, as he becomes embroiled in a conspiracy involving alien technology.
As Wikus uncovers the truth about the mysterious prawns and their connection to his own fate, he must confront his own prejudices and question the nature of humanity.
With its visceral action sequences, socially relevant themes, and groundbreaking visual effects, District 9 is a thought-provoking exploration of identity, power, and redemption.", "Clondalkin", "../images/movie_images/District_9_.jpg", "../trailers/district 9.mp4"),
("Inception", 2010, "Action, Adventure, Sci-Fi", "Leonardo DiCaprio, Joseph Gordon-Levitt, Ellen Page", 30, "Inception is a mind-bending action adventure sci-fi film directed by Christopher Nolan.
Set in a world where technology allows people to enter and manipulate dreams, the film follows master thief Dom Cobb, portrayed by Leonardo DiCaprio, as he assembles a team to perform an impossible heist within the dreamscape.
As Cobb delves deeper into the layers of the subconscious, he grapples with his own guilt and grief while navigating a labyrinth of deception and intrigue.
With its stunning visuals, labyrinthine plot, and philosophical themes of reality and perception, Inception is a cinematic experience that challenges the mind and captivates the imagination.", "City West", "../images/movie_images/Inception_.jpg", "../trailers/inception.mp4"),
("The Social Network", 2010, "Biography, Drama", "Jesse Eisenberg, Andrew Garfield, Justin Timberlake", 2, "The Social Network is a compelling biography drama directed by David Fincher.
Based on the true story of the founding of Facebook, the film follows Mark Zuckerberg, portrayed by Jesse Eisenberg, as he navigates the complexities of friendship, betrayal, and ambition in the cutthroat world of Silicon Valley.
As Zuckerberg faces lawsuits and personal conflicts, he must confront the consequences of his actions and the impact of his creation on society.
With its sharp dialogue, nuanced performances, and exploration of modern technology and social dynamics, The Social Network is a riveting portrayal of innovation and its consequences.", "Clondalkin", "../images/movie_images/The_Social_Network.jpg", "../trailers/social network.mp4"),
("Toy Story 3", 2010, "Animation, Adventure, Comedy", "Tom Hanks, Tim Allen, Joan Cusack", 44, "Toy Story 3 is a heartwarming animated adventure comedy directed by Lee Unkrich.
As Andy prepares to leave for college, Woody, Buzz Lightyear, and the rest of the toys find themselves donated to a daycare center, where they must navigate a chaotic and unpredictable environment.
As they face new challenges and confront the truth about their own mortality, the toys must band together to escape and find a new home.
With its emotional storytelling, vibrant animation, and nostalgic themes of friendship and growing up, Toy Story 3 is a fitting conclusion to Pixar's beloved trilogy.", "Blanchardstown", "../images/movie_images/Toy_Story_3_.jpg", "../trailers/toy story 3.mp4"),
("The Avengers", 2012, "Action, Adventure, Sci-Fi", "Robert Downey Jr., Chris Evans, Scarlett Johansson", 25, "The Avengers is an exhilarating action adventure sci-fi film directed by Joss Whedon.
Bringing together iconic superheroes like Iron Man, Captain America, Thor, and the Hulk, the film follows the formation of the Avengers team as they unite to defend Earth from the villainous Loki and his alien army.
As the Avengers face off against overwhelming odds and confront their own personal demons, they must learn to work together and harness their unique abilities to save the world.
With its epic battles, charismatic performances, and witty humor, The Avengers is a thrilling and entertaining blockbuster that celebrates the power of teamwork and heroism.", "Clondalkin", "../images/movie_images/The_Avengers_.jpg", "../trailers/the avengers.mp4"),
("Gravity", 2013, "Thriller, Sci-Fi", "Sandra Bullock, George Clooney", 32, "Gravity is a gripping thriller directed by Alfonso Cuar�n.
Set in the vast expanse of outer space, the film follows Dr. Ryan Stone, a medical engineer portrayed by Sandra Bullock, and Matt Kowalski, a veteran astronaut played by George Clooney, as they struggle to survive after their space shuttle is destroyed by debris.
As they drift into the void, facing increasingly perilous obstacles and dwindling oxygen supplies, they must summon the courage and ingenuity to find a way back to Earth.
With its breathtaking visuals, intense performances, and existential themes of isolation and survival, Gravity is a cinematic tour de force that keeps audiences on the edge of their seats.", "Clondalkin", "../images/movie_images/Gravity.jpg", "../trailers/gravity.mp4"),
("Interstellar", 2014, "Thriller, Sci-Fi", "Matthew McConaughey, Anne Hathaway, Jessica Chastain", 51, "Interstellar is an epic thriller directed by Christopher Nolan.
Set in a near-future Earth plagued by environmental collapse, the film follows former NASA pilot Cooper, portrayed by Matthew McConaughey, as he embarks on a perilous journey through a wormhole in search of a new habitable planet for humanity.
As Cooper and his crew confront the mysteries of space and time, they must grapple with the limits of human knowledge and the power of love and sacrifice.
With its mind-bending visuals, ambitious storytelling, and thought-provoking themes of destiny and human resilience, Interstellar is a cinematic odyssey that pushes the boundaries of imagination.", "Clondalkin", "../images/movie_images/Interstellar.jpg", "../trailers/interstellar.mp4"),
("Mad Max: Fury Road", 2015, "Thriller, Action, Adventure", "Tom Hardy, Charlize Theron, Nicholas Hoult", 2, "Mad Max: Fury Road is a high-octane thriller directed by George Miller.
Set in a post-apocalyptic desert wasteland, the film follows the titular character, Max Rockatansky, portrayed by Tom Hardy, and Imperator Furiosa, played by Charlize Theron, as they join forces to escape from the tyrannical ruler Immortan Joe.
As they engage in a relentless pursuit across the barren landscape, they encounter a band of fierce warriors known as the War Boys and forge unlikely alliances in their quest for freedom.
With its breathtaking practical effects, adrenaline-fueled action sequences, and feminist themes of empowerment and redemption, Mad Max: Fury Road is a modern masterpiece of the action genre.", "City Center", "../images/movie_images/Mad_Max__Fury_Road.jpg", "../trailers/mad max.mp4"),
("La La Land", 2016, "Thriller, Musical, Romance", "Ryan Gosling, Emma Stone, John Legend", 10, "La La Land is a captivating musical thriller directed by Damien Chazelle.
Set in modern-day Los Angeles, the film follows aspiring actress Mia, portrayed by Emma Stone, and jazz musician Sebastian, played by Ryan Gosling, as they pursue their dreams in a city known for its glamour and ambition.
As their paths cross and their romance blossoms, they must confront the realities of success and sacrifice in the cutthroat entertainment industry.
With its dazzling musical numbers, heartfelt performances, and nostalgic homage to classic Hollywood, La La Land is a modern-day love letter to the magic of cinema.", "Blanchardstown", "../images/movie_images/La_La_Land_.jpg", "../trailers/lala land.mp4"),
("Get Out", 2017, "Thriller, Mystery, Horror", "Daniel Kaluuya, Allison Williams, Bradley Whitford", 45, "Get Out is a chilling thriller directed by Jordan Peele.
The film follows Chris Washington, portrayed by Daniel Kaluuya, as he visits the secluded estate of his girlfriend's wealthy family for the weekend.
As the weekend unfolds, Chris uncovers a series of disturbing secrets and sinister motives lurking beneath the surface of suburbia.
With its sharp social commentary, masterful suspense, and thought-provoking exploration of race and identity, Get Out is a groundbreaking film that redefines the horror genre.", "Tallaght", "../images/movie_images/Get_Out.jpg", "../trailers/get out.mp4"),
("Parasite", 2019, "Thriller, Drama, Comedy", "Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong", 14, "Parasite is a genre-defying thriller directed by Bong Joon-ho.
The film follows the impoverished Kim family as they infiltrate the lives of the wealthy Park family through a series of deceptive schemes.
As tensions rise and secrets are revealed, the Kims find themselves entangled in a web of lies and betrayal with devastating consequences.
With its razor-sharp wit, shocking twists, and incisive social commentary on class inequality, Parasite is a cinematic tour de force that defies categorization.", "City Center", "../images/movie_images/Parasite.jpg", "../trailers/parasite.mp4"),
("Tenet", 2020, "Thriller, Action, Sci-Fi", "John David Washington, Robert Pattinson, Elizabeth Debicki", 32, "Tenet is a mind-bending thriller directed by Christopher Nolan.
The film follows a secret agent known as the Protagonist, portrayed by John David Washington, as he embarks on a mission to prevent World War III.
As he delves into the world of international espionage, the Protagonist must navigate a web of time inversion and temporal manipulation to unravel the mysteries of a powerful weapon known as Tenet.
With its intricate plot, jaw-dropping action sequences, and philosophical exploration of time and reality, Tenet is a cinematic puzzle that challenges the mind and dazzles the senses.", "City Center", "../images/movie_images/Tenet.jpg", "../trailers/tenet.mp4"),
("Wonder Woman 1984", 2020, "Thriller, Action, Adventure", "Gal Gadot, Chris Pine, Kristen Wiig", 33, "Wonder Woman 1984 is an electrifying thriller directed by Patty Jenkins.
The film follows Diana Prince, portrayed by Gal Gadot, as she battles against two formidable foes: Maxwell Lord and Cheetah.
Set against the backdrop of the vibrant 1980s, Wonder Woman must harness all of her strength, wisdom, and courage to save humanity from destruction.
With its exhilarating action sequences, heartfelt performances, and empowering message of hope and resilience, Wonder Woman 1984 is a thrilling cinematic experience that celebrates the iconic superheroine.", "City Center", "../images/movie_images/Wonder_Woman_1984_.jpg", "../trailers/wonder woman.mp4"),
("Soul", 2020, "Fantasy, Drama, Comedy", "Jamie Foxx, Tina Fey, Graham Norton", 41, "Soul is a heartfelt fantasy drama directed by Pete Docter and Kemp Powers.
The film follows Joe Gardner, a middle-school band teacher and aspiring jazz musician, portrayed by Jamie Foxx, as he embarks on a journey through the afterlife.
As Joe navigates the Great Before and learns valuable lessons about purpose, passion, and the meaning of life, he discovers the true essence of his soul.
With its stunning animation, soulful soundtrack, and poignant exploration of existential themes, Soul is a cinematic masterpiece that resonates with audiences of all ages.", "Blanchardstown", "../images/movie_images/Soul.jpg", "../trailers/soul.mp4"),
("Nomad land", 2020, "Fantasy, Drama", "Frances McDormand, David Strathairn, Linda May", 48, "Nomadland is a poignant fantasy drama directed by Chlo� Zhao.
The film follows Fern, portrayed by Frances McDormand, a woman who embarks on a journey through the American West after losing everything in the Great Recession.
As Fern explores the vast landscapes and encounters fellow nomads living on the fringes of society, she discovers a newfound sense of freedom and belonging.
With its stunning cinematography, authentic performances, and meditative exploration of the human spirit, Nomadland is a cinematic experience that captures the essence of the American Dream.", "City Center", "../images/movie_images/Nomadland.jpg", "../trailers/nomadland.mp4"),
("The Trial of the Chicago 7", 2020, "Fantasy, Drama", "Eddie Redmayne, Sacha Baron Cohen, Mark Rylance", 12, "The Trial of the Chicago 7 is a gripping drama directed by Aaron Sorkin.
The film chronicles the infamous trial of seven defendants charged with inciting riots during the 1968 Democratic National Convention in Chicago.
As the defendants, including anti-war activists, cultural radicals, and countercultural figures, navigate the complexities of the legal system and clash with the authoritarian Judge Julius Hoffman, they become symbols of resistance and political dissent.
With its stellar ensemble cast, sharp dialogue, and timely exploration of civil liberties and social justice, The Trial of the Chicago 7 is a riveting courtroom drama that resonates with contemporary relevance.", "BallsBridge", "../images/movie_images/The_Trial_of_the_Chicago_7.jpg", "../trailers/chicago 7.mp4"),
("The Father", 2020, "Fantasy, Drama", "Anthony Hopkins, Olivia Colman, Mark Gatiss", 38, "The Father is a poignant drama directed by Florian Zeller.
The film follows Anthony, an aging man struggling with dementia, portrayed by Anthony Hopkins, as he grapples with the disintegration of his memory and identity.
As Anthony's perception of reality becomes increasingly fragmented, his daughter Anne, played by Olivia Colman, must confront her own grief and uncertainty in the face of her father's declining health.
With its powerful performances, innovative narrative structure, and profound exploration of loss and compassion, The Father is a deeply moving cinematic experience that sheds light on the human condition.", "City Center", "../images/movie_images/The_Father.jpg", "../trailers/father.mp4"),
("Promising Young Woman", 2020, "Fantasy, Thriller", "Carey Mulligan, Bo Burnham, Alison Brie", 54, "Promising Young Woman is a provocative thriller directed by Emerald Fennell.
The film follows Cassie Thomas, portrayed by Carey Mulligan, a woman seeking vengeance against those responsible for the sexual assault of her best friend Nina.
As Cassie embarks on a dangerous mission to expose the predators hiding in plain sight, she confronts the toxic culture of complicity and entitlement that perpetuates sexual violence.
With its bold storytelling, dark humor, and searing critique of rape culture, Promising Young Woman is a timely and thought-provoking film that challenges societal norms and expectations.", "City Center", "../images/movie_images/Promising_Young_Woman.jpg", "../trailers/Promising Young Woman .mp4"),
("Mank", 2020, "Fantasy, Drama", "Gary Oldman, Amanda Seyfried, Lily Collins", 13, "Mank is a captivating drama directed by David Fincher.
The film delves into the life of Herman J. Mankiewicz, portrayed by Gary Oldman, as he races to finish the screenplay for Orson Welles' groundbreaking film Citizen Kane.
As Mank navigates the cutthroat world of 1930s Hollywood and grapples with his own demons, including alcoholism and political intrigue, he leaves an indelible mark on cinema history.
With its meticulous attention to detail, stunning cinematography, and captivating performances, Mank is a mesmerizing tribute to the golden age of Hollywood.", "Blanchardstown", "../images/movie_images/Mank.jpg", "../trailers/Mank.mp4"),
("Sound of Metal", 2020, "Fantasy, Drama", "Riz Ahmed, Olivia Cooke, Paul Raci", 2, "Sound of Metal is a powerful drama directed by Darius Marder.
The film follows Ruben Stone, portrayed by Riz Ahmed, a heavy-metal drummer who begins to lose his hearing and must come to terms with his new reality.
As Ruben grapples with the challenges of deafness and the uncertainty of his future, he finds solace and purpose in a community of deaf recovering addicts.
With its immersive sound design, authentic representation of deaf culture, and raw emotional performances, Sound of Metal is a profoundly moving cinematic experience that explores the resilience of the human spirit.", "City Center", "../images/movie_images/Sound_of_Metal.jpg", "../trailers/Sound of Metal.mp4"),
("Ma Rainey's Black Bottom", 2020, "Fantasy, Drama", "Chadwick Boseman, Viola Davis, Glynn Turman", 35, "Ma Rainey's Black Bottom is a captivating drama directed by George C. Wolfe.
The film follows a turbulent recording session in 1920s Chicago as legendary blues singer Ma Rainey, portrayed by Viola Davis, clashes with her ambitious trumpeter Levee, played by Chadwick Boseman.
As tensions simmer and tempers flare, the characters confront issues of race, power, and artistic integrity in a society marked by racial injustice.
With its electrifying performances, vibrant period detail, and searing exploration of African-American culture and identity, Ma Rainey's Black Bottom is a cinematic triumph that honors the legacy of its legendary characters.", "City Center", "../images/movie_images/Ma_Rainey's_Black_Bottom.jpg", "../trailers/Ma Rainey's Black Bottom.mp4"),
("Dune", 2021, "Fantasy, Sci-Fi", "Timoth�e Chalamet, Rebecca Ferguson, Zendaya", 37, "Dune is an epic science fiction fantasy directed by Denis Villeneuve.
The film follows Paul Atreides, portrayed by Timoth�e Chalamet, a young nobleman destined to fulfill his role as the messiah of the desert planet Arrakis.
As Paul navigates the treacherous politics of the interstellar empire and confronts the malevolent House Harkonnen, he becomes embroiled in a battle for control of the most valuable substance in the universe: the spice melange.
With its breathtaking visuals, rich world-building, and epic storytelling, Dune is a cinematic spectacle that transports audiences to a distant future where destiny and power collide.", "Tallaght", "../images/movie_images/Dune.jpg", "../trailers/Dune.mp4"),
("No Time to Die", 2021, "Fantasy, Action", "Daniel Craig, Rami Malek, L�a Seydoux", 45, "No Time to Die is a pulse-pounding action fantasy directed by Cary Joji Fukunaga.
The film follows James Bond, portrayed by Daniel Craig, as he comes out of retirement to confront a dangerous new adversary named Safin, played by Rami Malek.
As Bond races against time to stop Safin from unleashing a deadly bioweapon, he must confront ghosts from his past and make the ultimate sacrifice to save the world.
With its exhilarating action sequences, high-stakes drama, and emotional depth, No Time to Die is a fitting conclusion to Daniel Craig's tenure as the iconic superspy.", "Tallaght", "../images/movie_images/No_Time_to_Die.jpg", "../trailers/No Time to Die .mp4"),
("Black Widow", 2021, "Fantasy, Action", "Scarlett Johansson, Florence Pugh, David Harbour", 15, "Black Widow is an electrifying action fantasy directed by Cate Shortland.
The film follows Natasha Romanoff, portrayed by Scarlett Johansson, as she confronts her past and reunites with her estranged family to take down a dangerous conspiracy.
As Natasha battles against formidable foes and grapples with the trauma of her past, she must confront the dark secrets that threaten to destroy her and those she loves.
With its pulse-pounding action, dynamic performances, and emotional resonance, Black Widow is a thrilling adventure that explores the complexities of family, identity, and redemption.", "Blanchardstown", "../images/movie_images/Black_Widow_.jpg", "../trailers/Black Widow.mp4"),
("Shang-Chi and the Legend of the Ten Rings", 2021, "Fantasy, Action", "Simu Liu, Awkwafina, Tony Leung", 14, "Shang-Chi and the Legend of the Ten Rings is an action-packed fantasy directed by Destin Daniel Cretton.
The film follows Shang-Chi, portrayed by Simu Liu, a skilled martial artist who must confront his past and embrace his destiny as the legendary warrior.
As Shang-Chi teams up with his friend Katy, played by Awkwafina, and faces off against the powerful Ten Rings organization led by his father Wenwu, portrayed by Tony Leung, he discovers the true power within himself.
With its thrilling fight sequences, captivating mythology, and groundbreaking representation, Shang-Chi and the Legend of the Ten Rings is a groundbreaking superhero epic that expands the Marvel Cinematic Universe.", "BallsBridge", "../images/movie_images/Shang-Chi_and_the_Legend_of_the_Ten_Rings_.jpg", "../trailers/Shang-Chi and the Legend of the Ten Rings.mp4"),
("Spider-Man: No Way Home", 2021, "Fantasy, Action", "Tom Holland, Zendaya, Benedict Cumberbatch", 30, "Spider-Man: No Way Home is an electrifying action fantasy directed by Jon Watts.
The film follows Peter Parker, portrayed by Tom Holland, as he grapples with the fallout from revealing his secret identity as Spider-Man to the world.
As Peter seeks the help of Doctor Strange, played by Benedict Cumberbatch, to undo the damage caused by a spell gone wrong, he finds himself confronting villains from alternate dimensions.
With its dazzling visual effects, emotional storytelling, and nostalgic callbacks to previous Spider-Man films, Spider-Man: No Way Home is a thrilling ride that celebrates the legacy of the iconic web-slinger.", "BallsBridge", "../images/movie_images/Spider-Man__No_Way_Home_.jpg", "../trailers/no way home.mp4"),
("The Suicide Squad", 2021, "Fantasy, Action", "Margot Robbie, Idris Elba, John Cena", 14, "The Suicide Squad is a wild and irreverent action fantasy directed by James Gunn.
The film follows a ragtag team of supervillains recruited by the government for a dangerous mission on the remote island of Corto Maltese.
As the Squad, including Harley Quinn, Bloodsport, and Peacemaker, battles against a ruthless dictator and a horde of deadly creatures, they must confront their own demons and forge unlikely alliances.
With its bold humor, explosive action, and colorful characters, The Suicide Squad is a deliriously fun ride that breathes new life into the superhero genre.", "Tallaght", "../images/movie_images/The_Suicide_Squad.jpg", "../trailers/The Suicide Squad.mp4"),
("Judas and the Black Messiah", 2021, "Fantasy, Drama", "Daniel Kaluuya, LaKeith Stanfield, Jesse Plemons", 8, "Judas and the Black Messiah is a gripping drama directed by Shaka King.
The film tells the true story of Fred Hampton, portrayed by Daniel Kaluuya, the charismatic leader of the Illinois Black Panther Party, and William O'Neal, played by LaKeith Stanfield, the FBI informant who infiltrated the organization.
As Hampton rises to prominence as a voice for social justice and Black liberation, O'Neal grapples with his moral conscience and the consequences of his betrayal.
With its powerful performances, thought-provoking themes, and riveting storytelling, Judas and the Black Messiah is a searing portrait of injustice and resistance.", "Blanchardstown", "../images/movie_images/Judas_and_the_Black_Messiah_.jpg", "../trailers/Judas and the Black Messiah.mp4"),
("The Green Knight", 2021, "Fantasy, Adventure", "Dev Patel, Alicia Vikander, Joel Edgerton", 12, "The Green Knight is a mesmerizing fantasy adventure directed by David Lowery.
The film follows Sir Gawain, portrayed by Dev Patel, a knight of King Arthur's Round Table, as he embarks on a perilous quest to confront the eponymous Green Knight.
As Gawain journeys through a mystical and surreal landscape filled with giants, monsters, and magic, he must confront his own fears and weaknesses in order to prove his worthiness and honor.
With its stunning visuals, haunting atmosphere, and poetic storytelling, The Green Knight is a cinematic masterpiece that reimagines a classic medieval tale for modern audiences.", "Tallaght", "../images/movie_images/The_Green_Knight.jpg", "../trailers/The Green Knight.mp4"),
("A Quiet Place Part II", 2021, "Fantasy, Horror", "Emily Blunt, Cillian Murphy, Millicent Simmonds", 38, "A Quiet Place Part II is a heart-pounding horror fantasy directed by John Krasinski.
The film picks up where the original left off, following the Abbott family as they navigate a post-apocalyptic world overrun by blind monsters with acute hearing.
As they search for other survivors and evade the creatures lurking in the shadows, they encounter new threats and uncover the secrets of the creatures' origins.
With its tense atmosphere, clever sound design, and powerful performances, A Quiet Place Part II is a worthy successor to the original and a thrilling cinematic experience.", "BallsBridge", "../images/movie_images/A_Quiet_Place_Part_II.jpg", "../trailers/A Quiet Place Part II .mp4"),
("Free Guy", 2021, "Fantasy, Action", "Ryan Reynolds, Jodie Comer, Taika Waititi", 56, "Free Guy is a hilarious action fantasy directed by Shawn Levy.
The film follows Guy, portrayed by Ryan Reynolds, a non-player character in a popular video game who becomes self-aware and decides to take control of his own destiny.
As Guy embarks on a quest to become the hero of his own story and win the heart of his fellow player Molotov Girl, played by Jodie Comer, he must confront the game's creator, Antwan, portrayed by Taika Waititi, and save the virtual world from destruction.
With its clever premise, irreverent humor, and thrilling action sequences, Free Guy is a delightful ode to gaming culture and the power of self-discovery.", "Tallaght", "../images/movie_images/Free_Guy.jpg", "../trailers/Free Guy.mp4"),
("Shazam! Fury of the Gods", 2023, "Fantasy, Action", "Zachary Levi, Helen Mirren, Lucy Liu", 32, "Shazam! Fury of the Gods is an exhilarating fantasy action film directed by David F. Sandberg.
The sequel to the 2019 hit Shazam!, this movie follows Billy Batson, played by Zachary Levi, as he navigates his newfound powers and faces a new threat in the form of the villainous Hespera, portrayed by Helen Mirren, and her sister Kalypso, played by Lucy Liu.
With its blend of humor, heart, and high-flying action sequences, Shazam! Fury of the Gods promises to be an electrifying adventure for audiences of all ages.", "Blanchardstown", "../images/movie_images/Shazam!_Fury_of_the_Gods_.jpg", "../trailers/Shazam! Fury of the Gods .mp4"),
("Black Adam", 2023, "Fantasy, Action", "Dwayne Johnson, Noah Centineo, Sarah Shahi", 17, "Black Adam is a thrilling fantasy action film directed by Jaume Collet-Serra.
Starring Dwayne Johnson in the titular role, the movie explores the backstory of the antihero Black Adam, a powerful ancient warrior who becomes a force for vengeance and justice.
As Black Adam battles against his enemies and grapples with his own moral code, he must decide whether to use his immense power for good or succumb to darkness.
With its epic scale, intense action sequences, and compelling character arc, Black Adam promises to be a must-see adventure for fans of superhero cinema.", "Clondalkin", "../images/movie_images/Black_Adam.jpg", "../trailers/black adam.mp4"),
("Spider-Man: Into the Spider-Verse", 2023, "Fantasy, Animation", "Shameik Moore, Hailee Steinfeld, Jake Johnson", 12, "Spider-Man: Into the Spider-Verse is a visually stunning fantasy animation directed by Joaquim Dos Santos, Kemp Powers, and Justin K. Thompson.
The sequel to the critically acclaimed 2018 film, this movie follows Miles Morales, voiced by Shameik Moore, as he teams up with other Spider-People from different dimensions to face a new threat.
With its groundbreaking animation style, heartfelt storytelling, and diverse cast of characters, Spider-Man: Into the Spider-Verse 2 promises to be an unforgettable cinematic experience.", "Clondalkin", "../images/movie_images/Spider-Man__Into_the_Spider-Verse_.jpg", "../trailers/spider verse.mp4"),
("Ant-Man and the Wasp: Quantumania", 2023, "Fantasy, Action", "Paul Rudd, Evangeline Lilly, Michael Douglas", 22, "Ant-Man and the Wasp: Quantumania is an action-packed fantasy film directed by Peyton Reed.
The third installment in the Ant-Man series, this movie follows Scott Lang, played by Paul Rudd, and Hope van Dyne, portrayed by Evangeline Lilly, as they navigate the quantum realm and face a new threat in the form of the villainous Kang the Conqueror.
With its blend of humor, heart, and mind-bending action, Ant-Man and the Wasp: Quantumania promises to take audiences on a wild ride through the multiverse.", "Tallaght", "../images/movie_images/Ant-Man_and_the_Wasp__Quantumania.jpg", "../trailers/ant man.mp4"),
("Sonic the Hedgehog", 2023, "Fantasy, Adventure", "Ben Schwartz, Jim Carrey, James Marsden", 7, "Sonic the Hedgehog is an exciting fantasy adventure directed by Jeff Fowler.
In this sequel to the 2020 hit film, Sonic, voiced by Ben Schwartz, teams up with his friend Tom, played by James Marsden, to stop the evil Dr. Robotnik, portrayed by Jim Carrey, from unleashing chaos upon the world.
With its fast-paced action, lovable characters, and nostalgic appeal, Sonic the Hedgehog 2 promises to be a thrilling ride for fans of the iconic video game franchise.", "Tallaght", "../images/movie_images/Sonic_the_Hedgehog_.jpg", "../trailers/Sonic the Hedgehog 2.mp4"),
("The Batman", 2024, "Fantasy, Adventure", "Jeffrey Wright, Rosario Dawson, John Leguizamo", 32, "The Batman: is an immersive fantasy adventure audio drama.
Produced by HBO Max, this audio series follows the Dark Knight, voiced by Jeffrey Wright, as he battles against Gotham City's most notorious villains and unravels the mysteries hidden within its shadowy streets.
With its gripping storytelling, stellar voice cast, and atmospheric sound design, The Batman: The Audio Adventures offers a fresh and thrilling take on the legendary Caped Crusader.", "Blanchardstown", "../images/movie_images/The_Batman_.jpg", "../trailers/The Batman 3.mp4"),
("Doctor Strange", 2024, "Fantasy, Adventure", "Benedict Cumberbatch, Elizabeth Olsen, Chiwetel Ejiofor", 17, "Doctor Strange is a mystical fantasy adventure directed by Sam Raimi.
Following the events of Doctor Strange in the Multiverse of Madness, this film sees Doctor Strange, portrayed by Benedict Cumberbatch, teaming up with Scarlet Witch, played by Elizabeth Olsen, and other Marvel heroes to confront a cosmic threat.
With its mind-bending visuals, epic battles, and cosmic stakes, Doctor Strange: The Illuminati promises to expand the Marvel Cinematic Universe in thrilling new directions.", "Tallaght", "../images/movie_images/Doctor_Strange.jpg", "../trailers/Doctor Strange.mp4"),
("Star Wars", 2022, "Fantasy, Sci-Fi", "Daisy Ridley, John Boyega, Oscar Isaac", 27, "Star Wars: Return of the Sith is an epic fantasy sci-fi film directed by J.J. Abrams.
The sequel to the sequel trilogy, this movie follows Rey, Finn, Poe, and the rest of the Resistance as they face the remnants of the First Order and a new threat rising from the shadows.
With its thrilling space battles, emotional character arcs, and nods to the original trilogy, Star Wars: Return of the Sith promises to be a fitting conclusion to the Skywalker saga.", "Blanchardstown", "../images/movie_images/Star_Wars_3_.jpg", "../trailers/star wars 3.mp4"),
("Toy Story ", 2024, "Fantasy, Animation", "Tom Hanks, Tim Allen, Annie Potts", 12, "Toy Story  is a heartwarming fantasy animation directed by Josh Cooley.
The beloved toy characters return for another adventure, as Woody, Buzz Lightyear, and the gang find themselves in a new owner's playroom.
With its charming characters, poignant themes, and cutting-edge animation, Toy Story 5 continues the legacy of Pixar's iconic franchise with humor and heart.", "Tallaght", "../images/movie_images/Toy_Story_3_.jpg", "../trailers/Toy Story 5.mp4"),
("James Bond 26", 2024, "Fantasy, Action", "Tom Hardy, Charlize Theron, Idris Elba", 32, "James Bond 26 is a high-octane fantasy action film directed by Christopher Nolan.
Starring Tom Hardy as the iconic spy James Bond, this movie follows 007 as he embarks on a globe-trotting mission to thwart a diabolical plot that threatens world peace.
With its breathtaking stunts, dazzling special effects, and charismatic performances, James Bond 26 is a must-see for fans of the legendary franchise.", "Blanchardstown", "../images/movie_images/James_Bond_Skyfall.jpg", "../trailers/James Bond 26.mp4"),
("The Beekeeper", 2024, "Drama, Thriller", "Tom Hardy, Emily Blunt", 22, "The Beekeeper is a gripping drama-thriller directed by acclaimed filmmaker Denis Villeneuve. The story centers on John, a troubled beekeeper portrayed by Tom Hardy, who becomes entangled in a web of secrets and deception when he discovers a sinister plot within his community. Emily Blunt delivers a captivating performance as Sarah, John's wife, who becomes embroiled in the dangerous consequences of his discoveries. With its haunting atmosphere, intense performances, and thought-provoking themes, The Beekeeper is a masterful exploration of paranoia, trust, and the darkness that lies beneath the surface of seemingly idyllic small-town life.", "Blanchardstown", "../images/movie_images/The_Beekeeper.jpg", "../trailers/the_beekeeper.mp4"),
("Family Plan", 2024, "Comedy, Family", "Steve Carell, Jennifer Aniston", 51, "Family Plan is a heartwarming comedy directed by Jason Reitman. The film follows the misadventures of a chaotic family as they attempt to navigate through a series of comical challenges while planning a long-overdue family vacation. Steve Carell shines as the bumbling yet lovable patriarch, while Jennifer Aniston delivers a charming performance as his equally quirky wife. With its endearing characters, hilarious antics, and heartfelt moments, Family Plan reminds audiences of the importance of love, laughter, and togetherness in the midst of life's chaos.", "Clondalkin", "../images/movie_images/Family_Plan.jpg", "../trailers/family_plan.mp4"),
("American Star", 2024, "Biography, Drama", "Leonardo DiCaprio, Meryl Streep", 32, "American Star is a captivating biographical drama directed by Steven Spielberg. The film chronicles the remarkable life and career of a legendary Hollywood icon, exploring the highs and lows of fame, fortune, and the pursuit of artistic excellence. Leonardo DiCaprio delivers a tour-de-force performance in the lead role, embodying the charisma and complexity of the iconic star, while Meryl Streep shines in a supporting role as his devoted mentor and confidante. With its sweeping scope, stellar performances, and poignant storytelling, American Star is a cinematic masterpiece that celebrates the enduring power of dreams and the indomitable spirit of the human heart.", "City West", "../images/movie_images/American_Star.jpg", "../trailers/american_star.mp4"),
("Furiosa Mad Max", 2024, "Action, Adventure", "Charlize Theron, Chris Hemsworth", 17, "Furiosa Mad Max is an adrenaline-fueled action-adventure directed by George Miller. Set in a dystopian future where survival is a constant battle, the film follows the fierce warrior Furiosa, portrayed by Charlize Theron, as she embarks on a perilous journey across the wasteland in search of freedom and redemption. Chris Hemsworth joins the cast in a dynamic role, bringing charisma and intensity to the screen. With its breathtaking visuals, pulse-pounding action sequences, and compelling performances, Furiosa Mad Max delivers a thrilling cinematic experience that will leave audiences breathless.", "Tallaght", "../images/movie_images/Furiosa_Mad_Max.jpg", "../trailers/furiosa_mad_max.mp4");


 
INSERT INTO moviessaved (username, movie_name)
VALUES 
('john_doe', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('john_doe', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('john_doe', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('jane_smith', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('jane_smith', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('jane_smith', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alex_brown', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alex_brown', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alex_brown', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('emma_jones', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('emma_jones', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('emma_jones', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('mike_wilson', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('mike_wilson', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('mike_wilson', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('sarah_clark', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('sarah_clark', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('sarah_clark', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('chris_evans', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('chris_evans', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('chris_evans', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('laura_taylor', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('laura_taylor', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('laura_taylor', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('kevin_miller', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('kevin_miller', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('kevin_miller', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('amy_adams', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('amy_adams', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('amy_adams', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alison_reilly', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alison_reilly', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alison_reilly', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1));








INSERT INTO moviesviewed (username, movie_name)
VALUES 
('john_doe', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('john_doe', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('john_doe', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('jane_smith', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('jane_smith', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('jane_smith', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alex_brown', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alex_brown', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alex_brown', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('emma_jones', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('emma_jones', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('emma_jones', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('mike_wilson', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('mike_wilson', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('mike_wilson', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('sarah_clark', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('sarah_clark', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('sarah_clark', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('chris_evans', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('chris_evans', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('chris_evans', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('laura_taylor', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('laura_taylor', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('laura_taylor', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('kevin_miller', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('kevin_miller', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('kevin_miller', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('amy_adams', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('amy_adams', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('amy_adams', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alison_reilly', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alison_reilly', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1)),
('alison_reilly', (SELECT movie_name FROM movies ORDER BY RAND() LIMIT 1));