using Microsoft.OpenApi.Models;
using Nexus.core.db;

var builder = WebApplication.CreateBuilder(args);


builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen(c =>
{
     c.SwaggerDoc("v1", new OpenApiInfo { Title = "Nexus API", Description = "DASC Nexus API Documentation", Version = "v1" });
});

var app = builder.Build();

if (app.Environment.IsDevelopment())
{
   app.UseSwagger();
   app.UseSwaggerUI(c =>
   {
      c.SwaggerEndpoint("/swagger/v1/swagger.json", "DASC_Nexus API V1");
   });
}

app.MapGet("/", () => "Hello World!");
app.MapGet("/students", () => new StudentData().Students);
app.MapGet("/students/{id}", (int id) => new StudentData().GetStudent(id));
app.MapPost("/students", (Student student) =>
{
    var studentData = new StudentData();
    studentData.AddStudent(student);
    return student;
});
app.MapPut("/students", (Student student) =>
{
    var studentData = new StudentData();
    studentData.UpdateStudent(student);
    return student;
});
app.MapDelete("/students/{id}", (int id) =>
{
    var studentData = new StudentData();
    studentData.DeleteStudent(id);
    return Results.NoContent();
});

app.Run();
