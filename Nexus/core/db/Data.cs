namespace Nexus.core.db;

public record Student{
    public int Id { get; init; }
    public string Name { get; init; }
}

public class StudentData
{
    public List<Student> Students { get; set; }
    public StudentData()
    {
        Students = new List<Student>
        {
            new Student { Id = 0, Name = "John" },
            new Student { Id = 1, Name = "John Doe" },
            new Student { Id = 2, Name = "Jane Doe" },
            new Student { Id = 3, Name = "John Smith" }
        };
    }

    public Student GetStudent(int id)
    {
        return Students.FirstOrDefault(s => s.Id == id);
    }

    public void AddStudent(Student student)
    {
        Students.Add(student);
    }

    public void DeleteStudent(int id)
    {
        var student = GetStudent(id);
        if (student is null)
        {
            return;
        }
        Students.Remove(student);
    }

    public void UpdateStudent(Student student)
    {
        var index = Students.FindIndex(s => s.Id == student.Id);
        if (index == -1)
        {
            return;
        }
        Students[index] = student;
    }
}
