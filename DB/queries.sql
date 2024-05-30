-- Postes Info on backoffice
    --retrieving all we want. but we need to filter it and rename them
    SELECT p.*, u.id AS user_id, c.*, t.*, PC.*, PT.*
    FROM posts p
    JOIN users u ON p.user_id = u.id
    JOIN post_themathics PT ON p.id = PT.post_id
    JOIN thematics t ON PT.thematic_id = t.id
    JOIN post_categories PC ON p.id = PC.post_id
    JOIN categories c ON PC.category_id = c.id
    WHERE p.user_id = 3;

    -- filtered version:
    -- all posts which their user_id = 3 and related thematices,categories
    -- SELECT p.title,p.created_at, p.user_id AS 'Author' , u.id AS 'user_id', u.name AS 'Author', c.*, t.*, PC.*, PT.*
    SELECT p.title, u.name AS 'Author', t.title AS 'thematic', c.title AS 'category' ,p.created_at
    FROM posts p
    JOIN users u ON p.user_id = u.id
    JOIN post_themathics PT ON p.id = PT.post_id
    JOIN thematics t ON PT.thematic_id = t.id
    JOIN post_categories PC ON p.id = PC.post_id
    JOIN categories c ON PC.category_id = c.id
    WHERE p.user_id = 3;
