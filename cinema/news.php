<?php
session_start();
if(!isset($_SESSION["uname"]))
{
	header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEMA.MOVIES</title>
    <link rel="stylesheet" href="view/styles.css">
    <script src="https://kit.fontawesome.com/a3cf2330ae.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="sidebar">
    <button class="button6" onclick="document.location='profile.php'">
        <i class="fas fa-user"></i>
        <span class="sidebar-text" style="display: none;">Profile</span>
    </button>
    <button class="button6" onclick="document.location='home.php'">
        <i class="fas fa-home"></i>
        <span class="sidebar-text" style="display: none;">Home</span>
    </button>
    <button class="button6" onclick="document.location='index.php'">
        <i class="fas fa-th-large"></i>
        <span class="sidebar-text" style="display: none;">Categories</span>
    </button>
    <button class="button6 active" onclick="document.location='news.php'">
        <i class="fa fa-bullhorn"></i>
        <span class="sidebar-text" style="display: none;">News</span>
    </button>
    <button class="button6" onclick="document.location='cart.php'">
        <i class="fas fa-shopping-cart"></i>
        <span class="sidebar-text" style="display: none;">Cart</span>
    </button>
    <button class="button6" onclick="document.location='history.php'">
        <i class="far fa-clock"></i>
        <span class="sidebar-text" style="display: none;">History</span>
    </button>
    <button class="button6" onclick="document.location='saved.php'">
        <i class="fas fa-heart"></i>
        <span class="sidebar-text" style="display: none;">Saved</span>
    </button>
    <button class="button6" onclick="document.location='updated.php'">
        <i class="fas fa-bell"></i>
        <span class="sidebar-text" style="display: none;">Updated</span>
    </button>
    <button class="button6" onclick="document.location='liked.php'">
        <i class="far fa-thumbs-up"></i>
        <span class="sidebar-text" style="display: none;">Liked</span>
    </button>
    <!-- Add more buttons as needed -->
</div>
<?php include 'view/header.html'; ?>
<div class="content">




<h2>Your News</h2>





    <div class="news-cards-container">
        <!-- News Card 1 -->
        <div class="news-card">
            <img src="view\img\NEWS\im8.jpg" alt="News 1" class="news-card-image">
            <div class="news-card-content">
                <h3 class="news-card-title">Mission: Impossible 8’ Now Titled ‘The Final Reckoning</h3>
                <p class="news-card-description">In a subsequent Instagram post with the trailer, Cruise wrote, “Our lives are the sum of our choices.”

                    Cruise reprises his role as Ethan Hunt in the eighth film, which like many in the series is from writer-director Christopher McQuarrie, and will star Henry Czerny, Hayley Atwell, Ving Rhames, Simon Pegg, Pom Klementieff and Vanessa Kirby.

                    The film also features Hannah Waddingham, Nick Offerman, Katy O’Brian and Tramell Tillman.

                    Cruise and McQuarrie produce the Paramount and Skydance film. David Ellison, Dana Goldberg, Don Granger and Chris Brock executive produce.

                    While Cruise has been open about wanting to keep making Mission: Impossible movies into his 80s, The Hollywood Reporter revealed earlier this month that Paramount wanted to promote the eighth film as the “final” entry in the franchise, to boost audience interest. Paramount also wants to bring the film, the budget of which is approaching $400 million amid production delays, to Cannes.

                    The seventh film, Mission: Impossible: Dead Reckoning (originally titled Part One, with the eighth movie originally titled Part Two), has a 94 percent freshness rating on Rotten Tomatoes and grossed $571 million at the global box office.</p>
            </div>
        </div>

        <!-- News Card 2 -->
        <div class="news-card">
            <img src="view\img\NEWS\DJPRICE.JPG" alt="News 2" class="news-card-image">
            <div class="news-card-content">
                <h3 class="news-card-title">Dwayne Johnson’s ‘Red One’ Unwraps $26 Million at International Box Office, ‘Venom 3’ Nears $400 Million Globally</h3>
                <p class="news-card-description">“Red One,” a Christmas-themed release in which Dwayne “The Rock” Johnson plays Santa’s head of security, didn’t have too big a bounty to unwrap in its international box office debut. The film collected just $26.6 million from 25,195 screens across 75 overseas markets over the weekend.

                    By comparison, “Venom: The Last Dance” added $33 million from 66 overseas markets over the same three-day frame while in its third weekend of release. The third and final entry in Sony’s comic book trilogy has grossed $279.4 million overseas and $394.2 million globally to date. Though “Venom 3” has continued to draw audiences beyond opening weekend, the newest entry in the Tom Hardy-led alien symbiote saga is pacing behind its predecessors, 2018’s “Venom” ($642 million internationally and $856 million globally) and 2021’s “Let There Be Carnage” ($293 million internationally and $506 million worldwide). However, “The Last Dance” cost $120 million, a relatively economical budget compared to other comic book adaptations, so it’ll be decently positioned in its theatrical run.
                    “Red One” opens on Nov. 15 at the domestic box office, where it’s projected to earn anywhere from $20 million to $40 million. The film, which is being released by Warner Bros. in overseas markets and Amazon MGM in North America, carries a gargantuan price tag of nearly $250 million and needs a long life on the big screen to justify that cost — which doesn’t include global marketing efforts. Amazon MGM, however, cares about much more than box office grosses. The tech behemoth sees theatrical releases as a way to lure top talent and generate buzz for the streaming service, Prime Video.

                    “Red One” started strongest in the United Kingdom, debuting in second place with $3.2 million from 902 screens. Other opening weekends included Mexico with $2.3 million, China with a soft $2 million and Spain with $1.5 million. Reviews have been mixed for “Red One,” which picks up as Saint Nick (J.K. Simmons) is kidnapped, which triggers a rescue mission led by one gruff North Pole body guard (Johnson) and an unwitting bounty hunter (Chris Evans). Jake Kasdan (“Jumanji: Welcome to the Jungle”) directed the film.

                    Elsewhere at the international box office, Universal and DreamWorks Animation’s “The Wild Robot” is nearing the $300 million mark. Ticket sales are currently at $292.4 million worldwide, including $161.5 million overseas.</p>
            </div>
        </div>

        <!-- News Card 3 -->
        <div class="news-card">
            <img src="view\img\NEWS\TLDR.JPG" alt="News 3" class="news-card-image">
            <div class="news-card-content">
                <h3 class="news-card-title">The Last Dance review – Chinese funeral business is backdrop for arresting, life-affirming drama</h3>
                <p class="news-card-description">Starting out as a prickly comedy in which wedding planner Dominic (Hong Kong standup icon Dayo Wong) switches to the funeral business, The Last Dance takes a sudden sombre turn. Dominic lands a seemingly unhinged client, turned down by all his competitors, who wants him to embalm her young son. As a string of putrefied matter hangs from the boy’s back while he is dressing him, Dominic realises he has already been dead for six months. It’s not the only mortician scene – and not the only note of unsettling realism with which writer-director Anselm Chan ballasts this well-constructed and punchy melodrama.

                    Bequeathed the funeral agent gig by his girlfriend’s retiring uncle, Dominic must get to grips with his new business partner: ball-breaking Taoist priest Master Man (Michael Hui), who performs the “breaking hell’s gate” rites that liberate departing souls. The veteran is unimpressed by the commercially oriented newcomer, who is so keen on flashy gimmicks that he commissions a paper Maserati for the funeral of someone who died in a car crash. It becomes apparent, though, that Man’s traditionalism is covering up his own grief and leads to his unbending treatment of anyone in his vicinity.
                    Growing into the job, Dominic realises that the two of them are complementary: “Taoist priests transcend the soul of the dead. Agents transcend the soul of the living.” And just as his protagonist freshens up the departed, Chan is skilled in breathing naturalness into melodrama; not just through macabre contrast, but also by earning the twists and contrivances through patiently handling Dominic’s transition to compassionate undertaker in a string of attentively written consultations. As deftly portrayed by Wong, his obsequious grin hides an inner strength – and Hui matches him with effortless irascibility.

                    There are moments of awkward plot suturing: it seems a stretch that the unbudgeable Man would concede at the last he’s been doing it all wrong. But Chan sticks the landing: a climax in which Man’s daughter Yuet (Michelle Wai), who has been held back by his antiquated sexism, comes to the fore. The arresting morbidity, the life-affirming bon mots, confident dramatic patterning, a breezy universality; these could all render The Last Dance prime remake material.

                    The Last Dance is in UK and Irish cinemas from 15 November, and in Australian cinemas from 5 December.</p>
            </div>
        </div>

        <!-- News Card 3 -->
        <div class="news-card">
            <img src="view\img\NEWS\STAM.JPG" alt="News 3" class="news-card-image">
            <div class="news-card-content">
                <h3 class="news-card-title">Star Trek's Anson Mount Stole An Acting Trick From William Shatner</h3>
                <p class="news-card-description">The Captain Pike Trekkies see on "Star Trek: Strange New Worlds" is a very different Captain Pike they saw in the original 1966 "Star Trek" pilot "The Cage." The latter Pike was played by Jeffrey Hunter as an angry, passionate figure, quick to lose his temper, and only able to solve problems through sheer force of enraged will. The Pike as seen in the 2009 "Star Trek" movie was played by Bruce Greenwood had a scene so "hideously uncomfortable" that we're shocked he agreed to return for the sequel. The newer Pike, as played by Anson Mount, is a lighthearted, gregarious figure, eager to engage in jocular diplomacy and greet any and all members of his staff into his quarters for breakfast. The Hunter Pike seems like he would be an intimidating boss. The Mount Pike is the boss you always wish you'd get whenever you start a new job. 

                    Indeed, if there's any character in "Star Trek" history that Pike most closely resembles, it might actually be Commander Riker (Jonathan Frakes) on "Star Trek: The Next Generation," as he, too, developed a command style based on social cheer and lighthearted banter; Riker was the one who loved playing poker with the Enterprise's senior staff. Pike is a far cry from the Boy Scout of Captain Archer (Scott Bakula), the authoritarian of Captain Janeway (Kate Mulgrew), the no-nonsense battle-worn ultraboss of Captain Sisko (Avery Brooks), the stern diplomat of Captain Picard (Patrick Stewart), or the gut-level man-of-action of Captain Kirk (William Shatner). 

                    In a 2023 interview with CinemaBlend, however, Mount admitted that he took a few subtle acting cues from Shatner when it came time to play Captain Pike. Although Captain Kirk (as played by Paul Wesley) is a recurring character on "Strange New Worlds," a single quirk of Shatner's performance leaked into Pike as well. Notably, Mount observed that Shatner always kept one hand in frame while seated in his captain's chair. That, Mount said, allows him to be far more expressive. </p>
            </div>
        </div>

        <!-- News Card 3 -->
        <div class="news-card">
            <img src="view\img\NEWS\JGIW.JPG" alt="News 3" class="news-card-image">
            <div class="news-card-content">
                <h3 class="news-card-title">Jeff Goldblum Isn’t Worried About ‘Wicked’ Competing with ‘Gladiator II’: There’s ‘Enough to Go Around’</h3>
                <p class="news-card-description">As Hollywood approaches the end of 2024, two major blockbusters remain on the release calendar: Jon M. Chu’s “Wicked” and Ridley Scott’s “Gladiator II.” The highly anticipated films have the potential to add a final burst of much-needed life to the 2024 box office or shake up an Oscar race that will begin to solidify after the holidays. Both films are releasing on November 22, which has turned into a box office event that many movie lovers have dubbed “Glicked.”

                    The rollout has echoes of the “Barbenheimer” phenomenon from 2023, when both Christopher Nolan’s “Oppenheimer” and Greta Gerwig’s “Barbie” were released on the same date. What began as a series of silly memes about two wildly different films coming out at once soon turned into one of the most positive box office developments in recent memory, with many viewers making a point to see both films. Even if the two films were originally viewed as competitors, they both ended up benefiting from the other’s presence.
                    Jeff Goldblum is crossing his fingers for a comparable experience when “Wicked,” in which he plays the Wonderful Wizard of Oz, hits theaters next week. Speaking to Deadline at the Los Angeles premiere, Goldblum expressed hope that the two films would both lift each other up at the box office.

                    ”Nobody’s in competition — it’s an abundance mentality world with enough to go around,” Goldblum said when asked about the two films sharing a release date. He went on to add that competitors learning to peacefully coexist is a major element of “Wicked,” as demonstrated by the rivalry between Glinda (Ariana Grande) and Elphaba (Cynthia Erivo). “That’s part of the theme of our show!”

                    Goldblum went on to express his utter joy about being part of the “Wicked” movie, explaining that his casting was the culmination of 20 years of obsession with the source material.

                    “When I found out about it, I jumped up and down about it like a child of 10,” he said. “I had been a fan of the show. I had met Kristin Chenoweth and Idina Menzel backstage after crying my eyes out. I followed it for 20 years. I heard they were going to make a movie, so I was very excited.”</p>
            </div>
        </div>

        <!-- News Card 3 -->
        <div class="news-card">
            <img src="view\img\NEWS\JBSM.JPG" alt="News 3" class="news-card-image">
            <div class="news-card-content">
                <h3 class="news-card-title">Javier Bardem: Menendez Bros. Case Being Reopened ‘Speaks Volumes About the Quality’ of Ryan Murphy’s ‘Monsters’</h3>
                <p class="news-card-description">

                    “Shrek” director Vicky Jenson celebrated the premiere of her new Netflix film “Spellbound,” the second animated feature from John Lasseter-led Skydance Animation, in New York City on Monday November 11. The story stars Rachel Zegler, Javier Bardem, and Nicole Kidman in a fairy tale that takes place in the mythical kingdom of Lumbria as Princess Ellian embarks on “an invigorating quest” to break the spell.

                    Bardem has had quite a busy last couple of months following the September premiere of Ryan Murphy’s “Monsters: The Lyle and Erik Menendez Story.” Following the buzz from the show, the famous true crime case got a viral amount of attention nearly 30 years since the brothers were sentenced. On October 24, the Los Angeles district attorney recommended that Lyle and Erik Menendez be resentenced after being convicted of murdering their parents over three decades ago.
                    “Well, I think the reaction has been big,” Bardem told IndieWire. “There’s lots of people every day that come to tell me how much they like the show and how much they thought about it and follow the real case afterwards [and] by documentaries.”

                    “The thing is,” he continued, “the fact that the case can be reopened because of how the show has reached the audience and has put the case onto the table, it speaks volumes about the quality of the show and the quality of the research that Ryan Murphy and Ian Brennan did as artists and also as very responsible people knowing that they are dealing with very, very sensitive material.”

                    With “Spellbound,” Bardem takes on quite a different light compared to the incredibly tense roles that we are so often use to seeing him in. For him, he loves the change up. “I mean, I like to go from one place to the other. Being able to sing songs of [composer] Alan Menken, I mean, Jesus, it’s crazy. I loved it. It is my first animated movie and I feel very honored to be in this one, because Vicky Jenson is such a great director and what the movie speaks about is important.”
                    Lead and star Rachel Zegler was also thrilled to be a part of her first animation feature as well. Though, of course, she has sung onscreen previously, including her Golden Globe-winning performance in “West Side Story,” changing her voice to play a 14-year-old took a different type of preparation.

                    “[Though] I’m playing a 13-year-old in ‘Romeo + Juliet’ right now, being a 14-year-old in an animated movie is much different than playing one on stage,” Zegler told us. “You only have your voice. So I was really working with my vocal coach to start talking up here and that was like kind of the key into finding it, putting your larynx up here for all the folks at home. And that was really cool. It was a really different process for me and the music is so beautifully written by Alan Menken. It was just wildly different from anything I’ve had to do.”

                    She currently is leading Sam Gold’s production of William Shakespeare’s iconic love story on Broadway alongside Kit Connor. Zegler, who had been very supportive of voting early and voting blue for the recent presidential election, reflected on having to continue to perform at her best, despite last week’s election results.

                    “Sam’s original intention with doing ‘Romeo + Juliet’ was that kids broke into Circle in the Square because they needed to get something off their chest,” she said. “So doing any form of art with the week that we just had, feels like catharsis, and getting to be part of an amazing all-star cast that is mostly people of color, different gender identities, sexualities from different countries, creeds, you name it, we’ve got it. We represent what this world looks like despite what the news may have us think.”</p>
            </div>
        </div>

        <!-- Add more news cards as needed -->
    </div>
</div>
<?php include 'view/footer.html'; ?>
<script src="view/script.js"></script>
</body>
</html>