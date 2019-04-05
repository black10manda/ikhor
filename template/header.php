<?php ini_set('error_reporting',0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo($title); ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="with=device-whith, initial-scale=1">
  <link rel="shortcut icon" href="img/logo.jpg">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<style type="text/css">
        @keyframes escalar{
          0%{
            transform: scale(0);
          }50%{
            transform: scale(.5);
          }100%{
            transform: scale(1);
          }
        }
        @keyframes rotar{
          from{
            transform: rotate(0deg);
            }to{
              transform: rotate(720deg);
            }
        }
        @keyframes rotateY{
          from{
            transform: rotateY(0deg);
            }to{
              transform: rotateY(720deg);
            }
        }
        @keyframes rotateX{
          from{
            transform: rotateX(0deg);
            }to{
              transform: rotateX(720deg);
            }
        }
        @keyframes escalar_rotar{
          from{
            transform: scale(0) rotate(0deg);
          }to{
            transform: scale(1) rotate(360deg);
          }
        }
        @keyframes opacidad{
          from{
            opacity: 0;
            }to{
              opacity: 1;
            }

        }

        img.anim_scale{
          animation: escalar;
          animation-duration: 4s;
          animation-timing-function: linear;
        }
        img.anim_rotate{
          animation: rotar;
          animation-duration: 5s;
          animation-timing-function: cubic-bezier(0.1, 0.7, 1, 0.1);
        }
        img.anim_rotate_escale{
          animation-name: escalar_rotar;
          animation-duration: 5s;
          animation-timing-function: linear;
        }
        img.anim_rotatey{
          animation-name: rotateY;
          animation-duration: 5s;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
          transform-style: preserve-3d;
        }
        img.anim_rotatex{
          animation-name: rotateX;
          animation-duration: 5s;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
          transform-style: preserve-3d;
        }
        img.anim_opacity{
          animation-name: opacidad;
          animation-duration: 5s;
          animation-timing-function: linear;
          animation-iteration-count: infinite;
        }
        img.anim_hover_1{
          opacity: .5;
          transition:  transform 1s linear;

        }
        img.anim_hover_1:hover{
          opacity: 1;
          transform: scale(1.2);
        }

      </style>
</head>
<body >
	