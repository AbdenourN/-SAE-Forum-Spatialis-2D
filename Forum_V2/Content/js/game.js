var selectedCharacterSprite;
var playerNameText;
var player;
var currentRoom = 'main';
var gameStarted = false;

function selectCharacter(selectedImage) {
    selectedCharacterSprite = selectedImage.getAttribute('data-character');
    // Mettre en évidence le personnage sélectionné
    var characterImages = document.querySelectorAll('#characters img');
    characterImages.forEach(img => {
        img.classList.remove('selected');
    });
    selectedImage.classList.add('selected');
}

function startGame() {
    var pseudo = document.getElementById("pseudoInput").value;
    if (pseudo && selectedCharacterSprite) {
        document.getElementById("characterSelection").style.display = "none";

        var config = {
            type: Phaser.AUTO,
            width: 1920,
            height: 1080,
            physics: {
                default: 'arcade',
                arcade: {
                    gravity: { y: 0 },
                    debug: false
                }
            },
            scene: {
                preload: preload,
                create: create,
                update: update
            }
        };

        var game = new Phaser.Game(config);

        window.addEventListener('resize', function () {
            game.resize(window.innerWidth, window.innerHeight);
            resizeBackground.call(game.scene.scenes[0], currentBackground);
        });
        
        function preload() {
        //HOUSE LEFT
            this.load.image('house_left', 'Content/img/bg/house_left.png');
            this.load.image('house_left_porte', 'Content/img/bg/porte_entree_left.png');
            this.load.image('house_left_sol', 'Content/img/bg/house_left_sol.png');
            this.load.image('porte_entree_left', 'Content/img/bg/porte_entree_left.png');
            this.load.image('house_left_sol', 'Content/img/bg/house_left_sol.png');

            this.load.image('obstacle_bat_left1', 'Content/img/bg/obstacle_vertical_2.png');
            this.load.image('obstacle_bat_left2', 'Content/img/bg/obstacle_3.png');
            this.load.image('tp_galerie', 'Content/img/bg/teleporte.png');

            this.load.image('obstacle_derriere_maison_left', 'Content/img/bg/obstacle_derriere_maison_1.png');
            this.load.image('obstacle_bat_left', 'Content/img/bg/obstacle_blocage_porte.png');


        //HOUSE MID
            this.load.image('obstacle_bat_mid1', 'Content/img/bg/obstacle_1test.png');
            this.load.image('obstacle_bat_mid2', 'Content/img/bg/obstacle_1test.png');
            this.load.image('obstacle2', 'Content/img/bg/house_mid.png');
            this.load.image('obstacle_bat_mid', 'Content/img/bg/obstacle_blocage_porte.png');
            this.load.image('obstacle_bat_mid_sol', 'Content/img/bg/house_mid_sol.png');
            this.load.image('obstacle_derriere_maison', 'Content/img/bg/obstacle_derriere_maison_1.png');
            this.load.image('obstacle_forum', 'Content/img/bg/obstacle.png');
            this.load.image('tp_forum', 'Content/img/bg/teleporte.png');

        //HOUSE RIGHT
            this.load.image('house_right', 'Content/img/bg/house_right.png');
            this.load.image('house_right_porte', 'Content/img/bg/porte_entree_right.png');
            this.load.image('house_right_sol', 'Content/img/bg/house_right_sol.png');
            this.load.image('porte_entree_right', 'Content/img/bg/porte_entree_right.png');
            this.load.image('house_right_sol', 'Content/img/bg/house_right_sol.png');

            this.load.image('obstacle_bat_right1', 'Content/img/bg/obstacle_vertical.png');
            this.load.image('obstacle_bat_right2', 'Content/img/bg/obstacle_vertical.png');
            this.load.image('tp_profil', 'Content/img/bg/teleporte.png');

            this.load.image('obstacle_derriere_maison_right', 'Content/img/bg/obstacle_derriere_maison_1.png');
            this.load.image('obstacle_bat_right', 'Content/img/bg/obstacle_blocage_porte.png');

            //BACKGROUND
            this.load.image('background', 'Content/img/bg/map_2.png');
            this.load.spritesheet('selectedCharacter', `${selectedCharacterSprite}.png`, { frameWidth: 96, frameHeight: 96 });
            this.load.image('background2', 'Content/img/bg/bg4.jpg');

            
        }
        var collisionEnabled = false;
        var obstacle_forum;
        var tp_forum;
        var obstacle_bat_mid;
        var obstacle_derriere_maison;

        var porte_entree_left

        function create() {
            
            //BATIMENT LEFT
            var house_left = this.physics.add.sprite(300, 493, 'house_left');

            house_left.setDepth(3);
            house_left.setScale(1.7);
            this.physics.world.enable(house_left);
            house_left.body.setAllowGravity(false);
            house_left.body.setImmovable(true);

            porte_entree_left = this.physics.add.sprite(228, 710, 'porte_entree_left');

            porte_entree_left.setDepth(2.9);
            porte_entree_left.setScale(1.7);
            this.physics.world.enable(porte_entree_left);
            porte_entree_left.body.setAllowGravity(false);
            porte_entree_left.body.setImmovable(true);
            porte_entree_left.setDepth(1);

            var house_left_sol = this.physics.add.sprite(228, 796, 'house_left_sol');

            house_left_sol.setDepth(2);
            house_left_sol.setScale(1.6);
            this.physics.world.enable(house_left_sol);
            house_left_sol.body.setAllowGravity(false);
            house_left_sol.body.setImmovable(true);

            //----- OBSTACLE LEFT----------

            var obstacle_bat_left1 = this.physics.add.sprite(100, 663, 'obstacle_bat_left1');

            obstacle_bat_left1.setDepth(1);
            obstacle_bat_left1.setScale(1.6);
            this.physics.world.enable(obstacle_bat_left1);
            obstacle_bat_left1.body.setAllowGravity(false);
            obstacle_bat_left1.body.setImmovable(true);

            var obstacle_bat_left2 = this.physics.add.sprite(400, 663, 'obstacle_bat_left2');

            obstacle_bat_left2.setDepth(1);
            obstacle_bat_left2.setScale(1.6);
            this.physics.world.enable(obstacle_bat_left2);
            obstacle_bat_left2.body.setAllowGravity(false);
            obstacle_bat_left2.body.setImmovable(true);

            tp_galerie = this.physics.add.sprite(228, 520, 'tp_galerie');

            tp_galerie.setDepth(2.9);
            tp_galerie.setScale(1.6);
            this.physics.world.enable(tp_galerie);
            tp_galerie.body.setAllowGravity(false);
            tp_galerie.body.setImmovable(true);
            tp_galerie.setDepth(1);


            //----- OBSTACLE DERRIERE LEFT----------
            obstacle_derriere_maison_left = this.physics.add.sprite(228, 430, 'obstacle_derriere_maison_left');

            obstacle_derriere_maison_left.setDepth(1);
            obstacle_derriere_maison_left.setScale(1.6);
            this.physics.world.enable(obstacle_derriere_maison_left);
            obstacle_derriere_maison_left.body.setAllowGravity(false);
            obstacle_derriere_maison_left.body.setImmovable(true);
            
            
            obstacle_bat_left = this.physics.add.sprite(228, 638, 'obstacle_bat_left');

            obstacle_bat_left.setDepth(1);
            obstacle_bat_left.setScale(1.6);
            this.physics.world.enable(obstacle_bat_left);
            obstacle_bat_left.body.setAllowGravity(false);
            obstacle_bat_left.body.setImmovable(true);



            //BATIMENT MILIEU
            var obstacle_bat_mid_sol = this.physics.add.sprite(961, 793, 'obstacle_bat_mid_sol');

            obstacle_bat_mid_sol.setDepth(2);
            obstacle_bat_mid_sol.setScale(1.6);
            this.physics.world.enable(obstacle_bat_mid_sol);
            obstacle_bat_mid_sol.body.setAllowGravity(false);
            obstacle_bat_mid_sol.body.setImmovable(true);

            var obstacle_bat_mid1 = this.physics.add.sprite(755, 638, 'obstacle_bat_mid1');

            obstacle_bat_mid1.setDepth(1);
            obstacle_bat_mid1.setScale(1.6);
            this.physics.world.enable(obstacle_bat_mid1);
            obstacle_bat_mid1.body.setAllowGravity(false);
            obstacle_bat_mid1.body.setImmovable(true);

            var obstacle_bat_mid2 = this.physics.add.sprite(1150, 638, 'obstacle_bat_mid2');

            obstacle_bat_mid2.setDepth(1);
            obstacle_bat_mid2.setScale(1.6);
            this.physics.world.enable(obstacle_bat_mid2);
            obstacle_bat_mid2.body.setAllowGravity(false);
            obstacle_bat_mid2.body.setImmovable(true);

            obstacle_derriere_maison = this.physics.add.sprite(945, 430, 'obstacle_derriere_maison');

            obstacle_derriere_maison.setDepth(1);
            obstacle_derriere_maison.setScale(1.6);
            this.physics.world.enable(obstacle_derriere_maison);
            obstacle_derriere_maison.body.setAllowGravity(false);
            obstacle_derriere_maison.body.setImmovable(true);
            
            
            obstacle_bat_mid = this.physics.add.sprite(945, 638, 'obstacle_bat_mid1');

            obstacle_bat_mid.setDepth(1);
            obstacle_bat_mid.setScale(1.6);
            this.physics.world.enable(obstacle_bat_mid);
            obstacle_bat_mid.body.setAllowGravity(false);
            obstacle_bat_mid.body.setImmovable(true);
            

            var obstacle2 = this.physics.add.sprite(983, 420, 'obstacle2');

            obstacle2.setDepth(3);
            obstacle2.setScale(1.7);
            this.physics.world.enable(obstacle2);
            obstacle2.body.setAllowGravity(false);
            obstacle2.body.setImmovable(true);

            obstacle_forum = this.physics.add.sprite(961, 679, 'obstacle_forum');

            obstacle_forum.setDepth(2.9);
            obstacle_forum.setScale(1.7);
            this.physics.world.enable(obstacle_forum);
            obstacle_forum.body.setAllowGravity(false);
            obstacle_forum.body.setImmovable(true);
            obstacle_forum.setDepth(1);

            tp_forum = this.physics.add.sprite(945, 470, 'tp_forum');

            tp_forum.setDepth(2.9);
            tp_forum.setScale(1.6);
            this.physics.world.enable(tp_forum);
            tp_forum.body.setAllowGravity(false);
            tp_forum.body.setImmovable(true);
            tp_forum.setDepth(1);


            //BATIMENT RIGHT
            var house_right = this.physics.add.sprite(1650, 493, 'house_right');

            house_right.setDepth(3);
            house_right.setScale(1.7);
            this.physics.world.enable(house_right);
            house_right.body.setAllowGravity(false);
            house_right.body.setImmovable(true);

            porte_entree_right = this.physics.add.sprite(1580, 710, 'porte_entree_right');

            porte_entree_right.setDepth(2.9);
            porte_entree_right.setScale(1.7);
            this.physics.world.enable(porte_entree_right);
            porte_entree_right.body.setAllowGravity(false);
            porte_entree_right.body.setImmovable(true);
            porte_entree_right.setDepth(1);

            var house_right_sol = this.physics.add.sprite(1580, 826, 'house_right_sol');

            house_right_sol.setDepth(2);
            house_right_sol.setScale(1.6);
            this.physics.world.enable(house_right_sol);
            house_right_sol.body.setAllowGravity(false);
            house_right_sol.body.setImmovable(true);

            //----- OBSTACLE RIGHT----------

            var obstacle_bat_right1 = this.physics.add.sprite(1750, 690, 'obstacle_bat_right1');

            obstacle_bat_right1.setDepth(1);
            obstacle_bat_right1.setScale(1.6);
            this.physics.world.enable(obstacle_bat_right1);
            obstacle_bat_right1.body.setAllowGravity(false);
            obstacle_bat_right1.body.setImmovable(true);

            var obstacle_bat_right2 = this.physics.add.sprite(1465, 690, 'obstacle_bat_right2');

            obstacle_bat_right2.setDepth(1);
            obstacle_bat_right2.setScale(1.6);
            this.physics.world.enable(obstacle_bat_right2);
            obstacle_bat_right2.body.setAllowGravity(false);
            obstacle_bat_right2.body.setImmovable(true);

            tp_profil = this.physics.add.sprite(1600, 500, 'tp_profil');

            tp_profil.setDepth(2.9);
            tp_profil.setScale(1.6);
            this.physics.world.enable(tp_profil);
            tp_profil.body.setAllowGravity(false);
            tp_profil.body.setImmovable(true);
            tp_profil.setDepth(1);

            //----- OBSTACLE DERRIERE RIGHT----------

            obstacle_derriere_maison_right = this.physics.add.sprite(1610, 430, 'obstacle_derriere_maison_right');

            obstacle_derriere_maison_right.setDepth(1);
            obstacle_derriere_maison_right.setScale(1.6);
            this.physics.world.enable(obstacle_derriere_maison_right);
            obstacle_derriere_maison_right.body.setAllowGravity(false);
            obstacle_derriere_maison_right.body.setImmovable(true);
            
            
            obstacle_bat_right = this.physics.add.sprite(1590, 638, 'obstacle_bat_right');

            obstacle_bat_right.setDepth(1);
            obstacle_bat_right.setScale(1.6);
            this.physics.world.enable(obstacle_bat_right);
            obstacle_bat_right.body.setAllowGravity(false);
            obstacle_bat_right.body.setImmovable(true);


            //-----BACKGROUND----------

            currentBackground = this.add.image(0, 0, 'background').setOrigin(0, 0);
            resizeBackground.call(this, currentBackground);

            player = this.physics.add.sprite(100, 910, 'selectedCharacter').setScale(2);
            player.setDepth(2)
            this.physics.world.enable(player);
            player.body.setAllowGravity(true);


            this.physics.world.enable([player, obstacle_forum]);
            this.physics.world.enable([player, porte_entree_left]);
            this.physics.world.enable([player, porte_entree_right]);

            obstacle2.body.setSize(obstacle2.width, obstacle2.height, true);
            house_left.body.setSize(house_left.width, house_left.height, true);
            house_right.body.setSize(house_left.width, house_left.height, true);

           this.physics.add.collider(player, obstacle_bat_mid1, collisionHandler, null, this);
           this.physics.add.collider(player, obstacle_bat_mid2, collisionHandler, null, this);
          
           this.physics.add.collider(player, obstacle_bat_right1, collisionHandler, null, this);
           this.physics.add.collider(player, obstacle_bat_right2, collisionHandler, null, this);

           this.physics.add.collider(player, obstacle_bat_left1, collisionHandler, null, this);
           this.physics.add.collider(player, obstacle_bat_left2, collisionHandler, null, this);
        
           this.anims.create({
                key: 'walk',
                frames: this.anims.generateFrameNumbers('selectedCharacter', { start: 0, end: 4 }),
                frameRate: 5,
                repeat: -1
            });

            playerNameText = this.add.text(0, 0, pseudo, { font: '30px Arial', fill: '#ffff' });
            cursors = this.input.keyboard.createCursorKeys();
            playerNameText.setDepth(3.1);

            gameStarted = true;
        }

        function update() {
            
            if (!gameStarted) return;

            player.setVelocity(0);

            if (cursors.left.isDown) {
                player.setVelocityX(-200);
                player.anims.play('walk', true);
                player.flipX = true;
            } else if (cursors.right.isDown) {
                player.setVelocityX(200);
                player.anims.play('walk', true);
                player.flipX = false;
            }

            if (cursors.up.isDown) {
                player.setVelocityY(-160);
            } else if (cursors.down.isDown) {
                player.setVelocityY(160);
            }

            if (!cursors.left.isDown && !cursors.right.isDown) {
                player.anims.stop();
            }


            player.y = Phaser.Math.Clamp(player.y, 495, 980);
            player.x = Phaser.Math.Clamp(player.x, 0, this.sys.game.config.width);

            playerNameText.x = player.x - playerNameText.width / 2;
            playerNameText.y = player.y - 80;

            //------------------DERRIERE MAISON DEPLACEMENT-------------------

            if (this.physics.overlap(player, obstacle_derriere_maison_left) || this.physics.overlap(player, obstacle_derriere_maison) || this.physics.overlap(player, obstacle_derriere_maison_right)) {
                // Activer la collision avec obstacle_bat_mid
                if (!collisionEnabled) {
                    // Créer le collider seulement si ce n'est pas déjà activé
                    colliderObstacleBatLeft = this.physics.add.collider(player, obstacle_bat_left, collisionHandler, null, this);
                    colliderObstacleBatMid = this.physics.add.collider(player, obstacle_bat_mid, collisionHandler, null, this);
                    colliderObstacleBatRight = this.physics.add.collider(player, obstacle_bat_right, collisionHandler, null, this);


                    collisionEnabled = true;
                }
            } else {
                if (collisionEnabled) {
                    colliderObstacleBatLeft.destroy();
                    colliderObstacleBatMid.destroy();
                    colliderObstacleBatRight.destroy();

                    collisionEnabled = false;
                }
            }


            if(this.physics.overlap(player,porte_entree_left)){
                
                if (this.physics.overlap(player, tp_galerie)) {
                    var nouvelleFenetre = window.open("/Exo/Forum_V2/chrislin/?controller=forum&action=galerie", '_blank');
                    player.x = 228;
                    player.y = 670;
                }
            }
        

            //TELEPORTE MID FORUM
            if(this.physics.overlap(player,obstacle_forum)){
                
                if (this.physics.overlap(player, tp_forum)) {
                    // Rediriger vers une autre page JavaScript
                    var nouvelleFenetre = window.open("/Exo/Forum_V2/chrislin/?controller=forum&action=accueil", '_blank');
                    player.x = 955;
                    player.y = 630;
                }
            }
            //TELEPORTE RIGHT PROFIL
            if(this.physics.overlap(player,porte_entree_right)){
                
                if (this.physics.overlap(player, tp_profil)) {
                    // Rediriger vers une autre page JavaScript
                    var nouvelleFenetre = window.open("/Exo/Forum_V2/chrislin/?controller=profil", '_blank');
                    player.x = 1580;
                    player.y = 700;
                }
            }

            //handleRoomChange.call(this);


        }

        function handleRoomChange() {
            if (player.x >= this.sys.game.config.width - player.width && currentRoom === 'main') {
                console.log('Changement vers la deuxième pièce');
                player.x = 50;
                currentBackground.setTexture('background2');
                resizeBackground.call(this, currentBackground);
                currentRoom = 'second';
            } else if (player.x <= 0 && currentRoom === 'second') {
                console.log('Retour à la pièce principale');
                player.x = this.sys.game.config.width - player.width - 50;
                currentBackground.setTexture('background');
                resizeBackground.call(this, currentBackground);
                currentRoom = 'main';
            }
        }

        function resizeBackground(background) {
            var scaleX = this.cameras.main.width / background.width;
            var scaleY = this.cameras.main.height / background.height;
            var scale = Math.max(scaleX, scaleY);
            background.setScale(scale).setScrollFactor(0);
        }
        function collisionHandler(player) {
            // Réinitialiser la position du joueur après une collision
            player.setVelocity(0); // Arrêter le joueur

        }
        
    } else {
        alert("Veuillez choisir un pseudo et un personnage.");
    }
}
