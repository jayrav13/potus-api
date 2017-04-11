select
presidents.number, presidents.name, presidents.image, presidents.previous_office, presidents.presidency_url, presidents.party_affiliation, presidents.start_date, presidents.end_date,
document_types.name AS document_type_name, document_types.slug AS document_types_slug,
documents.title, documents.url, documents.content, documents.document_date
from presidents
join document_types
on presidents.id = document_types.president_id
join documents
on documents.document_type_id = document_types.id
where number = 44;