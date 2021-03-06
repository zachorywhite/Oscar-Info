<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oscar Info</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
        
        <style type="text/css">
        
        html, body{
            background-image: url("489068.jpg");
            margin: 0;
            border: 0;
        }

        /* HEADER */    
        header{
            height: 50px;
            
        }
        
        .head-div{
            background-color: white;
            margin-left: 30%;
            margin-right: 30%;
            text-align: center;
            border-radius: 25px;
        }

        #home-link{
            text-decoration: none;
            color: black;
        }

        /* DROPDOWN BARS */
        #drop-menu{
            
            display: flex;
            justify-content: center;
        }

        #year-dropdown{
            width: 100px;
        }

        #category-dropdown{
            margin-left: 5px;
            width: 100px;
        }

        #go-button{
            margin-left: 5px;
        }

        /* DISPLAY BODY */
        .display{
            background-color: white;
            margin: 20px 5% 40px 5%;
            min-height: 100vh;
            border-radius: 25px;
            padding: 10px;
        }
        </style>

    </head>
    <?php
        //remove <script></script> and add php start and close tag
        //comment these two lines when code started working fine
        error_reporting(E_ALL);
        ini_set('display_errors',1);
        
        $filename = 'values.txt';
        $eachlines = file($filename, FILE_IGNORE_NEW_LINES);

    ?>
    
    <body>
        
        <div class="head-div">
            <h1 style="font-family: fantasy; color:#271547;">
                <a id="home-link" href="http://oscarinfo-com.stackstaging.com">
                    Oscar Info</a>
            </h1>
        </div>

            <div id="drop-menu">
                
                <select id="value" class="chosen" style="width: 130px;">
                <option disabled selected value="base">Select Year</option>
                <?php foreach($eachlines as $lines){ 
                    echo "<option value='".$lines."'>$lines</option>";
                }?>
            </select>

            <select name="category-dropdown" id="category-dropdown" class="chosen" style="width: 130px;">
                <option value="Category" disabled selected>Category</option>
                <option value="Best-Picture">Best Picture</option>
                <option value="Visual-Effects">Visual Effects</option>
                <option value="Best-Actor">Best Actor</option>
                <option value="Best-Actress">Best Actress</option>
                <option value="Best-Director">Best Director</option>
            </select>

            <button id="go-button">Go</button>

        </div>

        <div class="display">
           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates unde, saepe voluptate nulla veniam cupiditate vel ex consequuntur modi libero eos itaque porro, accusantium aliquid dignissimos beatae tempore aliquam. Sed?
           Rerum labore eveniet eius iusto debitis molestiae eum quos accusamus minima repellat perspiciatis, atque quibusdam expedita officiis accusantium soluta vitae odio inventore natus molestias odit, voluptatibus harum perferendis! Nostrum, quia?
           Ratione impedit autem voluptate, nobis omnis dolores corporis? Inventore recusandae repudiandae ex laudantium voluptates. Ab optio, animi quisquam explicabo illo quia nihil, labore id atque voluptates harum ex non error!
           Sapiente magni exercitationem temporibus, commodi rerum cum molestias labore deleniti ipsa, ab, distinctio quas neque accusantium aliquid eos! Beatae aperiam ea distinctio at eius! Ullam quos magni necessitatibus quaerat accusantium.
           Adipisci dolore facilis nobis non voluptatem blanditiis vitae perspiciatis doloremque. Ut vitae tenetur rem fugit repellat optio exercitationem natus aspernatur sed nesciunt maxime, voluptatibus omnis incidunt, corrupti, veniam nihil veritatis.
           Eius veniam, quidem animi dolorum maiores fuga soluta beatae iure voluptates cupiditate quibusdam distinctio error quae voluptatibus laborum amet, commodi officia. Sapiente nulla beatae maxime nemo recusandae, tempore molestias reiciendis!
           Vel soluta molestiae earum voluptates nihil, architecto laboriosam, perferendis autem, praesentium provident vitae fugiat voluptatibus assumenda beatae esse voluptatem voluptate rem consectetur ad optio sequi ipsam! Esse et aliquid tempore!
           Nemo possimus esse minus, quo libero repudiandae doloribus. Earum enim iure, hic quos laborum labore nulla soluta voluptatum maxime commodi itaque ad numquam fuga porro, architecto ut deleniti. Dolore, deleniti!
           Est quaerat sequi consequatur error, ullam ratione, provident impedit, aut laudantium beatae repellat recusandae a veniam officia sint consectetur assumenda voluptatibus et ducimus laborum aperiam. Libero, nisi. At, a accusamus?
           Quibusdam aliquid unde iste assumenda id omnis porro. Soluta expedita eos accusamus architecto ullam, ducimus ad perferendis vitae nemo modi nam, cumque nulla error fuga, illum quo quia asperiores nesciunt.
        </div>
    </body>
    
    <script type="text/javascript">
        
        $(".chosen").chosen();
        
    </script>
</html>